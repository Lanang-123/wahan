<?php

namespace App\Models\CheckinParkings;
use Carbon\Carbon;
use DB;

class CheckinParkingRepository
{
    public function find($id)
    {
        return CheckinParking::find($id);
    }

    public function getByUuid($uuid)
    {
        return CheckinParking::where('uuid', $uuid)->first();
    }

    public function getBySlug($slug)
    {
        return CheckinParking::where('slug', $slug)->first();
    }

    public function getByNumber($parkingNumber)
    {
        return CheckinParking::where('checkin_number', $parkingNumber)->first();
    }

    public function get()
    {
        return CheckinParking::get();
    }

    public function create($input)
    {
        return CheckinParking::create($input);
    }

    public function update(CheckinParking $model, $input)
    {
        return $model->update($input);
    }

    public function delete(CheckinParking $model)
    {
        return $model->delete();
    }

    public function getActive()
    {
        return CheckinParking::where('is_active', 1)->get();
    }

    public function getReport($start_date, $end_date, $car_type_id, $download)
    {
        $start_date = Carbon::parse($start_date)->format('Y-m-d');
        $end_date = Carbon::parse($end_date)->format('Y-m-d');
        $data = CheckinParking::whereDate('created_at', '>=', $start_date)
                                ->whereDate('created_at', '<=', $end_date);
        if ($car_type_id != '') {
            $data = $data->where('car_type_id', $car_type_id);
        }
    
        if ($download) {
            return $data->get();
        } else {
            return $data->paginate(50);
        }
    }

    public function getTotal($startDate, $endDate)
    {
        return CheckinParking::select([DB::raw('count(*) as total'), DB::raw('sum(total_passengers) as total_passengers'), DB::raw('sum(checkin_parking.price) as price'), 'car_types.name'])
                    ->join('car_types', 'checkin_parking.car_type_id', 'car_types.id')  
                    ->whereDate('checkin_parking.created_at', '>=', $startDate)
                    ->whereDate('checkin_parking.created_at', '<=', $endDate)
                    ->groupBy('car_type_id')
                    ->get();
    }

    public function getTotalPassenger($startDate, $endDate)
    {
        return CheckinParking::whereDate('created_at', '>=', $startDate)
                ->whereDate('created_at', '<=', $endDate)
                ->sum('total_passengers');
    }
}
