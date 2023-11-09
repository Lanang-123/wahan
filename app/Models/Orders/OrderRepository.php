<?php

namespace App\Models\Orders;
use Carbon\Carbon;
use DB;

class OrderRepository
{
    public function find($id)
    {
        return Order::find($id);
    }

    public function getByCode($code)
    {
        return Order::where('code', $code)->first();
    }

    public function getBySlug($slug)
    {
        return Order::where('slug', $slug)->first();
    }

    public function get()
    {
        return Order::get();
    }

    public function getByDate($currentDate)
    {
        $currentDate = Carbon::parse($currentDate)->format('Y-m-d');
        return Order::whereDate('created_at', $currentDate)->get();
    }

    public function create($input)
    {
        return Order::create($input);
    }

    public function update(Order $model, $input)
    {
        return $model->update($input);
    }

    public function delete(Order $model)
    {
        return $model->delete();
    }

    public function getActive()
    {
        return Order::where('is_active', 1)->get();
    }

    public function getByStatus($status)
    {
        return Order::where('status', $status)->get();
    }
    
    public function updateStatus($ids, $input)
    {
        return Order::whereIn('id', $ids)
        ->update($input);
    }
    
    public function getByIds($ids)
    {
        return Order::whereIn('id', $ids)->get();
    }

    public function getReport($startDate, $endDate, $download)
    {
        $startDate = Carbon::parse($startDate)->format('Y-m-d');
        $endDate = Carbon::parse($endDate)->format('Y-m-d');
        $data = Order::whereDate('created_at', '>=', $startDate)
                                ->whereDate('created_at', '<=', $endDate);
    
        if ($download) {
            return $data->get();
        } else {
            return $data->paginate(50);
        }
    }

    public function last()
    {
        return Order::orderBy('id', 'desc')->first();
    }

    public function getTransferList($orderNumber)
    {

        $order = Order::where('use_guide', '1')
                    ->where('already_transfer_fee', '0');
        if ($orderNumber) {
            $order = $order->where('order_number', $orderNumber);
        }

        return $order->paginate(20);
    }

    public function checkTransferFeeById($id)
    {
        return Order::where('use_guide', '1')
                    ->where('already_transfer_fee', '0')
                    ->where('id', $id)
                    ->first();
    }

    public function checkTransferFeeByOrderNumber($orderNumber)
    {
        return Order::where('use_guide', '1')
                    ->where('already_transfer_fee', '0')
                    ->where('order_number', $orderNumber)
                    ->first();
    }

    public function transferFeeFillter()
    {

        return Order::select('order_number')
                    ->where('use_guide', '1')
                    ->where('already_transfer_fee', '0')
                    ->get();
        
    }

    public function onlyTrashed($orderId = null, $perPage = 0)
    {
        $data = Order::onlyTrashed();

        if ($orderId) {
            $data = $data->where('id', $orderId);
        }

        if ($perPage > 0) {
            return $data->paginate($perPage);
        } else {
            return $data->get();
        }

    }

    public function getSummarySales($startDate, $endDate)
    {
        return Order::select([
                'use_guide', 
                DB::raw('count(*) as total_transaction'), 
                DB::raw('sum(orders.total_item) as total_item'), 
                DB::raw('sum(orders.total_price) as total_price'), 
                // DB::raw('sum(orders.already_transfer_fee) as total_already_transfer_fee'), 
                // DB::raw('sum(orders.use_guide) as total_use_guide'), 
                // DB::raw('sum(orders.use_guide - orders.already_transfer_fee) as total_not_transferred_yet'),
                // DB::raw('sum(IF (orders.use_guide = "1")) as total_price_with_guide'),
                // DB::raw('sum(CASE WHEN (orders.use_guide = "voucher") THEN 1 ELSE 0 END) as total_voucher'),
                // DB::raw('sum(CASE WHEN (order_items.product_type = "ticket") THEN 1 ELSE 0 END) as total_ticket'),
                // DB::raw('sum(CASE WHEN (order_items.product_type = "voucher") THEN 1 ELSE 0 END) as total_voucher'),
            ])
            // ->join('order_items', 'orders.id', 'order_items.order_id')
            ->whereDate('created_at', '>=', $startDate)
            ->whereDate('created_at', '<=', $endDate)
            ->groupBy('use_guide')
            ->get();
    }
}
