<?php

namespace App\Models\CheckinObjects;
use Carbon\Carbon;
use DB;

class CheckinObjectRepository
{
    public function find($id)
    {
        return CheckinObject::find($id);
    }

    public function getByUuid($uuid)
    {
        return CheckinObject::where('uuid', $uuid)->first();
    }

    public function getBySlug($slug)
    {
        return CheckinObject::where('slug', $slug)->first();
    }

    public function get()
    {
        return CheckinObject::get();
    }

    public function create($input)
    {
        return CheckinObject::create($input);
    }

    public function update(CheckinObject $model, $input)
    {
        return $model->update($input);
    }

    public function delete(CheckinObject $model)
    {
        return $model->delete();
    }

    public function getActive()
    {
        return CheckinObject::where('is_active', 1)->get();
    }

    public function getReport($start_date, $end_date, $download)
    {
        $start_date = Carbon::parse($start_date)->format('Y-m-d');
        $end_date = Carbon::parse($end_date)->format('Y-m-d');
        $data = CheckinObject::whereDate('created_at', '>=', $start_date)
                                ->whereDate('created_at', '<=', $end_date);
        if ($download) {
            return $data->get();
        } else {
            return $data->paginate(50);
        }
    }

    

    public function getTotal($startDate, $endDate)
    {
        return CheckinObject::select([DB::raw('count(*) as total'), DB::raw('sum(price) as price'), DB::raw('sum(use_guide) as total_with_guide'), DB::raw('sum(amount_fee) as amount_fee'), DB::raw('sum(price - amount_fee) as net_price')])  
        ->whereDate('created_at', '>=', $startDate)
        ->whereDate('created_at', '<=', $endDate)  
        ->groupBy('group_all')
        ->first();
    }
}
