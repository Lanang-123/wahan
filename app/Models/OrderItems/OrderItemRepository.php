<?php

namespace App\Models\OrderItems;
use Carbon\Carbon;
use DB;

class OrderItemRepository
{
    public function find($id)
    {
        return OrderItem::find($id);
    }

    public function getByCode($code)
    {
        return OrderItem::where('code', $code)->first();
    }

    public function getBySlug($slug)
    {
        return OrderItem::where('slug', $slug)->first();
    }

    public function get()
    {
        return OrderItem::get();
    }

    public function create($input)
    {
        return OrderItem::create($input);
    }

    public function update(OrderItem $model, $input)
    {
        return $model->update($input);
    }

    public function delete(OrderItem $model)
    {
        return $model->delete();
    }

    public function getActive()
    {
        return OrderItem::where('is_active', 1)->get();
    }

    public function getByStatus($status)
    {
        return OrderItem::where('status', $status)->get();
    }
    
    public function updateStatus($ids, $input)
    {
        return OrderItem::whereIn('id', $ids)
        ->update($input);
    }
    
    public function getByIds($ids)
    {
        return OrderItem::whereIn('id', $ids)->get();
    }

    public function getByTypeAndId($type, $id)
    {
        return OrderItem::where('product_type', $type)
                        ->where('product_id', $id)
                        ->first();
    }

    public function getTotalSales($startDate, $endDate)
    {
        return OrderItem::select([DB::raw('count(*) as total'), DB::raw('sum(price) as total_amount'), 'product_type'])
                    // ->whereDate('created_at', '>=', $startDate)
                    // ->whereDate('created_at', '<=', $endDate) 
                    ->groupBy('product_type')
                    ->get();
    }

    public function deleteByOrderId($order_id)
    {
        return OrderItem::where('order_id', $order_id)
                        ->delete();
    }

    public function checkIsUse($order_id)
    {
        return OrderItem::where('order_id', $order_id)
                    ->whereNotNull('checkin_time')
                    ->count();
    }

    public function getReport($startDate, $endDate, $type, $download)
    {
        $startDate = Carbon::parse($startDate)->format('Y-m-d');
        $endDate = Carbon::parse($endDate)->format('Y-m-d');
        $data = OrderItem::whereDate('created_at', '>=', $startDate)
                                ->whereDate('created_at', '<=', $endDate);
        if ($type != '') {
            $data = $data->where('product_type', $type);
        }
        if ($download) {
            return $data->get();
        } else {
            return $data->paginate(50);
        }
    
    }
}
