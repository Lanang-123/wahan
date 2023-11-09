<?php

namespace App\Models\FeeTransfers;


use DB;
use Carbon\Carbon;


class FeeTransferRepository
{
    public function find($id)
    {
        return FeeTransfer::find($id);
    }

    public function getByCode($code)
    {
        return FeeTransfer::where('code', $code)->first();
    }

    public function getBySlug($slug)
    {
        return FeeTransfer::where('slug', $slug)->first();
    }

    public function get()
    {
        return FeeTransfer::get();
    }

    public function create($input)
    {
        return FeeTransfer::create($input);
    }

    public function update(FeeTransfer $model, $input)
    {
        return $model->update($input);
    }

    public function delete(FeeTransfer $model)
    {
        return $model->delete();
    }

    public function getActive()
    {
        return FeeTransfer::where('is_active', 1)->get();
    }

    public function getByStatus($status)
    {
        return FeeTransfer::where('status', $status)->get();
    }

    public function updateStatus($ids, $input)
    {
        return FeeTransfer::whereIn('id', $ids)
            ->update($input);
    }

    public function getByIds($ids)
    {
        return FeeTransfer::whereIn('id', $ids)->get();
    }

    public function getReport($startDate, $endDate, $id, $download)
    {
        $startDate = Carbon::parse($startDate)->format('Y-m-d');
        $endDate = Carbon::parse($endDate)->format('Y-m-d');
        $data = FeeTransfer::with('order') // Include the 'order' relationship
            ->whereDate('created_at', '>=', $startDate)
            ->whereDate('created_at', '<=', $endDate);

        if ($id != '') {
            $data = $data->where('guide_id', $id);
        }

        if ($download) {
            return $data->get();
        } else {
            return $data->paginate(50);
        }
    }

    public function getTotal($startDate, $endDate)
    {
        return FeeTransfer::whereDate('created_at', '>=', $startDate)
            ->whereDate('created_at', '<=', $endDate)
            ->sum('total');
    }


}
