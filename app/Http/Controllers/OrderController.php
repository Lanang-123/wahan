<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tickets\TicketRepository as Ticket;
use App\Models\Vouchers\VoucherRepository as Voucher;
use App\Models\Orders\OrderRepository as Order;
use App\Models\OrderItems\OrderItemRepository as OrderItem;
use App\Models\Guides\GuideRepository as Guide;
use App\Models\Configs\ConfigRepository as Config;
use App\Models\FeeTransfers\FeeTransferRepository as FeeTransfer;
use App\Models\CheckinObjects\CheckinObjectRepository as CheckinObject;
use App\Models\CheckinParkings\CheckinParkingRepository as CheckinParking;
use DB;
use App\Http\Requests\OrderRequest;
use Helper;
use Carbon\Carbon;
use Carbon\CarbonInterval;

class OrderController extends Controller
{
    public function __construct(CheckinParking $checkinParkings, CheckinObject $checkinObjects, FeeTransfer $feeTransfers, Config $configs, Guide $guides, Ticket $tickets, Voucher $vouchers, Order $orders, OrderItem $orderItems)
    {
        $this->tickets = $tickets;
        $this->vouchers = $vouchers;
        $this->orders = $orders;
        $this->orderItems = $orderItems;
        $this->guides = $guides;
        $this->configs = $configs;
        $this->feeTransfers = $feeTransfers;
        $this->checkinObjects = $checkinObjects;
        $this->checkinParkings = $checkinParkings;
    }

    public function form(Request $request)
    {
        $currentDate = $request->input('currentDate');
        if (empty($currentDate)) {
            $currentDate = Carbon::now()->format('d M Y');
        }

        $productTypes = config('constant.PRODUCT_TYPES');
        $guides = $this->guides->getActive();
        // $ticketData = $this->mapProductData('ticket', $this->tickets->getByStatus('in-stock'));
        // $voucherData = $this->mapProductData('voucher', $this->vouchers->getByStatus('in-stock'));
        return view('pages.orders.form', compact('currentDate', 'productTypes', 'guides'));
    }

    public function formWithParking(Request $request)
    {
        $code = $request->input('code');
        $data = $this->checkinParkings->getByNumber($code);
        $currentDate = Carbon::now()->format('d M Y');
        
        if ($code) {
            if ($data) {
                $productTypes = config('constant.PRODUCT_TYPES');
                $guides = $this->guides->getActive();
                return view('pages.orders.withParking.form', compact('data', 'currentDate', 'productTypes', 'guides'));
            } else {
                return redirect(route('new-order-with-parking'))->with(['error'=> 'Nomor parkir tidak dapat ditemukan']);
            }
        } else {
            return view('pages.orders.withParking.form-parking', compact('currentDate'));
        }
    }

    public function orderList(Request $request) 
    {
        $currentDate = $request->input('currentDate');
        if (empty($currentDate)) {
            $currentDate = Carbon::now()->format('d M Y');
        }

        $orderData = $this->orders->getByDate($currentDate);
        return view('pages.orders.list', compact('currentDate', 'orderData'));
    }

    public function mapProductData($type, $data)
    {
        $map = [];
        if ($data AND count($data) > 0) {
            $map = collect($data)->map(function($item) use($type) {
                $price = 0;
                $text = $item['code'];
                if ($type == 'ticket') {
                    $price = $item->ticketType->price;
                    $text = $item['code'].' - '. $item->ticketType->name; 
                } else {
                    $price = $item->nominal;
                }

                return [
                    'id' => $item['id'],
                    'text' => $text,
                    'type' => $type,
                    'price' => $price,
                    'price_display' => Helper::getAmountDisplay($price),
                ];
            });
        }
        return $map;
    }

    public function create(OrderRequest $request)
    {
        $parking_id = $request->input('parking_id');
        $parking_data = $this->checkinParkings->find($parking_id);

        $orders = $request->input('orders');
        $use_guide = $request->input('use_guide');
        $guide_id = $request->input('guide_id');
        $use_guide = ($use_guide == 'on') ? 1:0;
        $use_guide_parking = 0;
        $route = 'new-order';

        if ($parking_id) {
            if ($parking_data) {
                $use_guide_parking = $parking_data->is_fee;
                // if (count($orders) != $parking_data->total_passengers) {
                //     return redirect()->back()->with(['error'=> 'Jumlah tamu tidak sesuai dengan jumlah tiket']);
                // }
                // if ($use_guide_parking) {
                //     $guide = $this->guides->getFirst();
                //     if ($guide) $guide_id = $guide->id;
                // }
                $route = 'new-order-with-parking';
            } else {
                return redirect()->back()->with(['error'=> 'Tiket parkir tidak dapat ditemukan']);
            }
        }

        DB::beginTransaction();
        try {
            $generateOrderNumber = $this->generateOrderNumber();
            if ($orders AND count($orders) > 0) {
                $total_price = 0;
                $orderInput = [
                    'order_number' => $generateOrderNumber['number'],
                    'total_item' => count($orders),
                    'total_price' => 0,
                    'use_guide' => $use_guide,
                    'use_guide_parking' => $use_guide_parking,
                    'guide_id' => ($use_guide) ? $guide_id : '',
                ];
                if ($parking_data) {
                    $orderInput['parking_id'] = $parking_data->id;
                    $totalDuration = Carbon::now()->diffInMinutes($parking_data->created_at);
                    // $for_human = CarbonInterval::minutes($totalDuration)->cascade()->forHumans();
                    $update_parking_input = [
                        'transaction_time' => Carbon::now()->format('H:i:s'),
                        'duration' =>$totalDuration,
                    ];
                    $this->checkinParkings->update($parking_data, $update_parking_input);
                }
                $order = $this->orders->create($orderInput);

                foreach ($orders as $item) {
                    $type = $item['type'];
                    $id = $item['id'];

                    $data = null;
                    $price = 0;
                    $productStatusInput = ['status' => 'in-use'];
                    if ($type == 'ticket') {
                        $data = $this->tickets->getByIdAndStatus($id, 'in-stock');
                        if ($data) {
                            $price = $data->ticketType->price;

                            //bypass checkin
                            $fee = round(($data->ticketType->fee * $data->ticketType->price/100), 1);
                            $inputObject = [
                                'ticket_id' => $data->id,
                                'order_item_id' => 0,
                                'use_guide' => $use_guide,
                                'guide_id' => ($use_guide) ? $guide_id : '',
                                'price' => $data->ticketType->price,
                                'amount_fee' => ($use_guide) ? $fee : 0,
                            ];
                            $checkinObject = $this->checkinObjects->create($inputObject);
                            $this->tickets->update($data, ['status' => 'used']);
                            // $this->orderItems->update($orderItem, ['checkin_time' => Carbon::now()]);
                            // $this->tickets->update($data, $productStatusInput);
                        } else {
                            if ($parking_data) {
                                return redirect()->back()->with(['error'=> 'Tiket tidak dapat ditemukan']);
                            } else {
                                return redirect(route($route))->with(['error'=> 'Tiket tidak dapat ditemukan']);
                            }
                        }
                    } else {
                        $data = $this->vouchers->getByIdAndStatus($id, 'in-stock');
                        if ($data) {
                            $price = $data->nominal;
                            $this->vouchers->update($data, $productStatusInput);
                        } else {
                            if ($parking_data) {
                                return redirect()->back()->with(['error'=> 'Voucher tidak dapat ditemukan']);
                            } else {
                                return redirect(route($route))->with(['error'=> 'Voucher tidak dapat ditemukan']);
                            }
                        }
                    }
                    $total_price += $price;

                    $orderItemInput = [
                        'order_id' => $order->id,
                        'product_type' => $type,
                        'product_id' => $id,
                        'product_data' => json_encode($data),
                        'price' => $price,
                        'checkin_time' => ($type == 'ticket') ? Carbon::now() : null //bypass checkin
                    ];
                    $orderItem = $this->orderItems->create($orderItemInput);
                    $this->checkinObjects->update($checkinObject, ['order_item_id'=> $orderItem->id]);//bypass checkin
                }
                $orderInput = [
                    'total_price' => $total_price,
                ];
                $this->orders->update($order, $orderInput);
                if ($generateOrderNumber['is_new']) {
                    $this->configs->resetOrderNumber();
                } else {
                    $this->configs->incrementOrderNumber();
                }
            }
            DB::commit();
            if ($parking_data) {
                return redirect(route('print-order', ['id' => $order->id, 'from' =>'with-parking']));
            } else {
                return redirect(route('print-order', ['id' => $order->id]));
            }
        } catch (\Throwable $th) {
            \Log::info($th);
            DB::rollback();
            if ($parking_data) {
                return redirect()->back()->with(['error'=> 'Terjadi kesalahan saat input ke database']);
            } else {
                return redirect(route($route))->with(['error'=> 'Terjadi kesalahan saat input ke database']);
            }
        }

        return redirect();
    }

    public function orderPrint($id)
    {
        $item = $this->orders->find($id);
        // dd($item);
        return view('pages.orders.order-print', compact('item'));
    }

    public function cancelOrder($id)
    {
        $order = $this->orders->find($id);
        if (!$order) {
            return redirect(route('new-order'))->with(['cancelError' => 'Data order tidak dapat ditemukan']);
        }
        $isUse = $this->orderItems->checkIsUse($order->id);
        if ($isUse) {
            return redirect(route('new-order'))->with(['cancelError' => 'Order Anda tidak dapat dibatalkan karena sudah terpakai']);
        }
        DB::beginTransaction();
        try {
            $orderItems = $order->items;
            if ($orderItems AND count($orderItems) > 0) {
                foreach ($orderItems as $item) {
                    $product = null;
                    if ($item->product_type == 'ticket') {
                        $product = $this->tickets->find($item->product_id);
                    } else {
                        $product = $this->vouchers->find($item->product_id);
                    }
                    if ($product) {
                        if ($item->product_type == 'ticket') {
                            $this->tickets->update($product, ['status' => 'in-stock']);
                        } else {
                            $this->vouchers->update($product, ['status' => 'in-stock']);
                        }
                    }
                }
            }
            //delete order item
            $this->orderItems->deleteByOrderId($order->id);
            //delete order 
            $this->orders->delete($order);
            DB::commit();
            return redirect(route('new-order'));
        } catch (\Throwable $th) {
            DB::rollback();
            return redirect(route('new-order'));
        }
    }

    public function generateOrderNumber()
    {
        $current_date = Carbon::now()->format('Y-m-d');
        $last_order = $this->orders->last();
        $last_number = $this->configs->getValByName('int_val', 'order_number');

        $is_new = false;
        if ($last_order) {
            $last_date = Carbon::parse($last_order->created_at)->format('Y-m-d');
            if ($current_date == $last_date) {
                $last_number++;
            } else {
                $last_number = 1;
                $is_new = true;
            }
        }
        $year = Carbon::now()->year;
        $month = Carbon::now()->month;
        $day = Carbon::now()->day;

        return [
            'number' => $year.$month.$day.Helper::getNumberString($last_number),
            'is_new' => $is_new
        ];
    }

    public function transferFeeIndex(Request $request)
    {
        $order_number = $request->input('order_number');
        $data = $this->orders->getTransferList($order_number);
        $orderFilter = $this->orders->transferFeeFillter();
        $test = [
            'data' => $data,
            'orderFilter' => $orderFilter,
            'order_number' => $order_number
        ];
        // dd($test);
        // $data = [];
        // $orderFilter = [];
        return view('pages.transferFee.index', compact('orderFilter', 'data', 'order_number'));
    }

    public function transferFeeForm($id)
    {
        $item = $this->orders->checkTransferFeeById($id);
        if (!$item) {
            return redirect(route('transfer-fee-list'))->with(['error' => 'Data order tidak dapat ditemukan']);
        }

        $paymentTypes = config('constant.PAYMENT_TYPES');
        return view('pages.transferFee.form', compact('item', 'paymentTypes'));
    }

    public function transferFeeByOrderNumber(Request $request)
    {
        $orderNumber = $request->input('order_number');
        $item = $this->orders->checkTransferFeeByOrderNumber($orderNumber);
        if (!$item) {
            return redirect(route('transfer-fee-list'))->with(['error' => 'Data order tidak dapat ditemukan']);
        }

        return redirect(route('edit-transfer-fee', ['id'=>$item->id]));
    }

    public function createTransferFee(Request $request)
    {
        $id = $request->input('id');
        $payment_type = $request->input('payment_type');
        $item = $this->orders->find($id);
        if (!$item) {
            return redirect(route('edit-transfer-fee', ['id' => $id]))->with(['error'=> 'Data order tidak dapat ditemukan']);
        }
        $guide = $item->guide;
        if (!$guide) {
            $guide = $this->guides->getFirst();
        }

        DB::beginTransaction();
        try {
            $input = [
                'guide_id' => $guide->id,
                'order_id' => $item->id,
                'payment_type' => $payment_type,
                'bank_name' => $guide->bank_name,
                'bank_account_number' => $guide->bank_account_number,
                'bank_account_name' => $guide->bank_account_name,
                'total' => $item->total_guide_fee,
                'status' => 'completed',
            ];
             $create = $this->feeTransfers->create($input);
             if ($create) {
                $this->orders->update($item, ['already_transfer_fee' => 1]);
                $orderItems = $item->items;
                if ($orderItems AND count($orderItems) > 0){
                    foreach ($orderItems as $orderItem) {
                        $ticket = $this->tickets->find($orderItem->product_id);
                        if ($ticket) {
                            $this->tickets->update($ticket, ['status' => 'expired']);
                        }
                        $this->orderItems->update($orderItem, ['checkout_time' => Carbon::now()]);
                    }
                }
             }
            DB::commit();
            return redirect(route('transfer-fee-list'))->with(['success'=> 'Data berhasil diproses.']);
        } catch (\Throwable $th) {
            DB::rollback();
            return redirect(route('edit-transfer-fee', ['id' => $id]))->with(['error'=> 'Terjadi kesalahan saat input ke database']);
        }
    }

    public function checkCode($code)
    {
        $type = null;
        $data = null;
        $price = 0;
        $text = '';

        $ticket = $this->tickets->getByCodeAndStatus($code, 'in-stock');
        if ($ticket) {
            $type = 'ticket';
            $data = $ticket;
            $price = $data->ticketType->price;
            $text = $data['code'].' - '. $data->ticketType->name; 
        } else {
            $voucher = $this->vouchers->getByCodeAndStatus($code, 'in-stock');
            if ($voucher) {
                $type = 'voucher';
                $data = $voucher;
                $price = $data->nominal;
                $text = $data['code'];
            }
        }
        if ($data) {
            
            $res = [
                'id' => $data['id'],
                'text' => $text,
                'type' => $type,
                'price' => $price,
                'price_display' => Helper::getAmountDisplay($price),
            ];
            return response()->json(['type' => $type, 'data' => $res]);
        } else {
            return response()->json(['error' => 'Data tidak dapat ditemukan'], 500);
        }
    }
}
