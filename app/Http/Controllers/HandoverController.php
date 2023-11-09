<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Handovers\HandoverRepository as Handover;
use App\Models\Tickets\TicketRepository as Ticket;
use App\Models\Vouchers\VoucherRepository as Voucher;
use App\Http\Requests\HandoverRequest;
use DB;
use Arr;
use PDF;
use Route;

class HandoverController extends Controller
{
    public function __construct(Handover $handovers, Ticket $tickets, Voucher $vouchers)
    {
        $this->handovers = $handovers;
        $this->tickets = $tickets;
        $this->vouchers = $vouchers;
    }

    public function index()
    {   
        $status = 'in-print';
        $view = 'pages.prints.index';
        $route = Route::currentRouteName();
        if ($route == 'handover-list') {
            // $status = 'in-stock';
            $view = 'pages.handovers.index';
        }
        $data = $this->handovers->getByStatus($status);
        return view($view, compact('data'));
    }

    public function form($id = null)
    {
        $item = null;
        if ($id) {
            $item = $this->handovers->find($id);
            if (!$item) {
                return redirect($this->routeIndex)->with(['error'=> 'Data tidak dapat ditemukan']);
            }
        }
        $ticketData = $this->tickets->getByStatus('created');
        $voucherData = $this->vouchers->getByStatus('created');
        $productTypes = config('constant.PRODUCT_TYPES');
        return view('pages.prints.form', compact('item', 'productTypes', 'ticketData', 'voucherData'));
    }

    public function create(HandoverRequest $request)
    {
        // dd($request->all());
        $name = $request->input('name');
        $type = $request->input('type');
        $product_items = $request->input('product_items');

        $product_ids = array();
        if ($product_items AND count($product_items) > 0) {
            foreach ($product_items as $key => $value) {
                if ($type == 'ticket') {
                    $product = $this->tickets->getByCode($key);
                } else if ($type == 'voucher') {
                    $product = $this->vouchers->getByCode($key);
                }
                if ($product) {
                    array_push($product_ids, $product->id);
                }
            }
        }

        $input = [
            'name' => $name,
            'type' => $type,
            'total' => count($product_ids),
            'product_id_json' => json_encode($product_ids),
            'status' => 'in-print',
        ];

        DB::beginTransaction();
        try {
            $create = $this->handovers->create($input);
            if ($create AND ($product_ids AND count($product_ids))) {
                if ($type == 'ticket') {
                    $this->tickets->updateStatus($product_ids, ['status' => 'in-print']);
                }
                if ($type == 'voucher') {
                    $this->vouchers->updateStatus($product_ids, ['status' => 'in-print']);
                }
            }
            DB::commit();
            return redirect(route('print-list'))->with(['success'=> 'Data berhasil ditambahkan.']);
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollback();
            return redirect(route('print-list'))->with(['error'=> 'Terjadi kesalahan saat input ke database']);
        }
    }

    public function download($id) 
    {
        $data = $this->handovers->find($id);
        if (empty($data)) {
            return redirect(route('print-list'))->with(['error'=> 'Data tidak dapat ditemukan']);
        }

        $product_ids = json_decode($data->product_id_json);
        $items = $this->getItems($data->type, $product_ids);
        
        return view('pages.prints.gelang-download', compact('items', 'data'));

        $pdf = PDF::loadView('pages.prints.download', compact('items'));
        return $pdf->stream('cetak.pdf',array('Attachment' => 0));
    }

    public function detail($id = null)
    {
        $data = $this->handovers->find($id);
        if (empty($data)) {
            return redirect(route('handover-list'))->with(['error'=> 'Data tidak dapat ditemukan']);
        }
        $product_ids = json_decode($data->product_id_json);
        $items = $this->getItems($data->type, $product_ids);

        return view('pages.handovers.form', compact('items', 'data'));
        
    }
    
    public function getItems($type, $ids)
    {
        $items = [];
        if ($type == 'ticket') {
            $items = $this->tickets->getByIds($ids);
        }
        if ($type == 'voucher') {
            $items = $this->vouchers->getByIds($ids);
        }
        return $items;
    }

    public function accepted($id = null)
    {
        $data = $this->handovers->find($id);
        if (empty($data)) {
            return redirect(route('handover-list'))->with(['error'=> 'Data tidak dapat ditemukan']);
        }
        $product_ids = json_decode($data->product_id_json);
        $type = $data->type;

        $input = [
            'status' => 'in-stock',
        ];

        DB::beginTransaction();
        try {
            $update = $this->handovers->update($data, $input);
            if ($update AND ($product_ids AND count($product_ids))) {
                if ($type == 'ticket') {
                    $this->tickets->updateStatus($product_ids, ['status' => 'in-stock']);
                }
                if ($type == 'voucher') {
                    $this->vouchers->updateStatus($product_ids, ['status' => 'in-stock']);
                }
            }
            DB::commit();
            return redirect(route('handover-list'))->with(['success'=> 'Data berhasil diupdate']);
        } catch (\Throwable $th) {
            DB::rollback();
            return redirect(route('handover-list'))->with(['error'=> 'Terjadi kesalahan saat input ke database']);
        }
    }
}
