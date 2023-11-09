<?php

namespace App\Models\CheckinRides;

use Carbon\Carbon;
use DB;

class CheckinRideRepository
{
    public function find($id)
    {
        return CheckinRide::find($id);
    }

    public function getByCode($code)
    {
        return CheckinRide::where('code', $code)->first();
    }

    public function getBySlug($slug)
    {
        return CheckinRide::where('slug', $slug)->first();
    }

    public function get()
    {
        return CheckinRide::get();
    }

    public function create($input)
    {
        return CheckinRide::create($input);
    }

    public function update(CheckinRide $model, $input)
    {
        return $model->update($input);
    }

    public function delete(CheckinRide $model)
    {
        return $model->delete();
    }

    public function getActive()
    {
        return CheckinRide::where('is_active', 1)->get();
    }

    public function getByStatus($status)
    {
        return CheckinRide::where('status', $status)->get();
    }
    
    public function updateStatus($ids, $input)
    {
        return CheckinRide::whereIn('id', $ids)
        ->update($input);
    }
    
    public function getByIds($ids)
    {
        return CheckinRide::whereIn('id', $ids)->get();
    }

    public function getReport($startDate, $endDate, $id, $download)
    {
        $startDate = Carbon::parse($startDate)->format('Y-m-d');
        $endDate = Carbon::parse($endDate)->format('Y-m-d');
        $data = CheckinRide::whereDate('created_at', '>=', $startDate)
                                ->whereDate('created_at', '<=', $endDate);
        if ($id != '') {
            $data = $data->where('ride_id', $id);
        }

        if ($download) {
            return $data->get();
        } else {
            return $data->paginate(50);
        }
    }

    public function getTotal($startDate, $endDate)
    {
        return CheckinRide::select([DB::raw('count(*) as total'), DB::raw('sum(checkin_rides.price) as price'), DB::raw('sum(checkin_rides.use_guide) as total_with_guide'), DB::raw('sum(checkin_rides.amount_fee) as amount_fee'), 'rides.name'])
        ->join('rides', 'checkin_rides.ride_id', 'rides.id')  
        ->whereDate('checkin_rides.created_at', '>=', $startDate)
        ->whereDate('checkin_rides.created_at', '<=', $endDate)  
        ->groupBy('ride_id')
        ->get();
    }
}
