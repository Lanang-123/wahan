<?php

namespace App\Models\Vouchers;
use Carbon\Carbon;

class VoucherRepository
{
    public function find($id)
    {
        return Voucher::find($id);
    }

    public function getByCode($code)
    {
        return Voucher::where('code', $code)->first();
    }
    public function getByCodeAndStatus($code, $status)
    {
        return Voucher::where('code', $code)
                    ->where('status', $status)
                    ->first();
    }

    public function getByIdAndStatus($id, $status)
    {
        return Voucher::where('id', $id)
                    ->where('status', $status)
                    ->first();
    }

    public function getBySlug($slug)
    {
        return Voucher::where('slug', $slug)->first();
    }

    public function get()
    {
        return Voucher::get();
    }

    public function create($input)
    {
        return Voucher::create($input);
    }

    public function update(Voucher $model, $input)
    {
        return $model->update($input);
    }

    public function delete(Voucher $model)
    {
        return $model->delete();
    }

    public function getActive()
    {
        return Voucher::where('is_active', 1)->get();
    }

    public function getByStatus($status)
    {
        return Voucher::where('status', $status)->get();
    }

    public function updateStatus($ids, $input)
    {
        return Voucher::whereIn('id', $ids)
                    ->update($input);
    }

    public function getByIds($ids)
    {
        return Voucher::whereIn('id', $ids)->get();
    }

    public function getReport($status, $download)
    {
        $data = Voucher::orderBy('id', 'desc');
        if ($status != '') {
            $data = $data->where('status', $status);
        }
    
        if ($download) {
            return $data->get();
        } else {
            return $data->paginate(50);
        }
    }
}
