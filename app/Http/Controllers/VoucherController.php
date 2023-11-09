<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vouchers\VoucherRepository as Voucher;
use App\Http\Requests\VoucherRequest;
use Str;
use Helper;

class VoucherController extends Controller
{
    public function __construct(Voucher $vouchers) 
    {
        $this->routeIndex = route('voucher-list');
        $this->vouchers = $vouchers;
    }
    
    public function index()
    {
        $data = $this->vouchers->get();
        return view('pages.vouchers.index', compact('data'));
    }
    
    public function form($code = null)
    {
        $item = null;
        if ($code) {
            $item = $this->vouchers->getByCode($code);
            if (!$item) {
                return redirect($this->routeIndex)->with(['error'=> 'Data tidak dapat ditemukan']);
            }
        }
        return view('pages.vouchers.form', compact('item'));
    }

    public function create(VoucherRequest $request)
    {
        $total = $request->input('total');
        $nominal = $request->input('nominal');
        $voucherStatus = config('constant.VOUCHER_STATUSES');
        $voucherTypes = config('constant.VOUCHER_TYPES');

        if ($total AND $total > 0) {
            for ($i=0; $i < $total; $i++) { 
                $input = [
                    'code' => Helper::generateRandomString(),
                    'type' => $voucherTypes[0],
                    'nominal' => $nominal,
                    'status' => $voucherStatus[0],
                ];
                $this->vouchers->create($input);
            }
        }

        return redirect($this->routeIndex)->with(['success'=> 'Data berhasil ditambahkan.']);
    }

    public function update(VoucherRequest $request, $code)
    {
        $name = $request->input('name');
        $price = $request->input('price');
        $is_active = (int) $request->input('is_active');

        $item = $this->vouchers->getByCode($code);
        if (!$item) {
            return redirect($this->routeIndex)->with(['error'=> 'Data tidak dapat ditemukan']);
        }

        $input = [
            'code' => Str::code($name, '-'),
            'name' => $name,
            'price' => $price,
            'is_active' => $is_active,
        ];
        $this->vouchers->update($item, $input);
        return redirect($this->routeIndex)->with(['success'=> 'Data berhasil diubah.']);
    }

    public function delete($code)
    {
        $item = $this->vouchers->getByCode($code);
        if (!$item) {
            return redirect($this->routeIndex)->with(['error'=> 'Data tidak dapat ditemukan']);
        }
        $this->vouchers->delete($item);
        return redirect($this->routeIndex)->with(['success'=> 'Data berhasil dihapus.']);
    }
}
