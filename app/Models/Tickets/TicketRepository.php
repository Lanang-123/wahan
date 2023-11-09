<?php

namespace App\Models\Tickets;
use DB;
use Carbon\Carbon;

class TicketRepository
{
    public function find($id)
    {
        return Ticket::find($id);
    }

    public function getByCode($code)
    {
        return Ticket::where('code', $code)->first();
    }

    public function getByCodeAndStatus($code, $status)
    {
        return Ticket::where('code', $code)
                    ->where('status', $status)
                    ->first();
    }

    public function getByIdAndStatus($id, $status)
    {
        return Ticket::where('id', $id)
                    ->where('status', $status)
                    ->first();
    }

    public function checkin($code, $status)
    {
        return Ticket::where('code', $code)
                    ->where('status', $status)
                    ->first();
    }

    public function getBySlug($slug)
    {
        return Ticket::where('slug', $slug)->first();
    }

    public function get()
    {
        return Ticket::get();
    }

    public function getWithPaginate($status, $limit, $code)
    {
        $data = New Ticket;
        if ($status != ''){
            $data = $data->where('status', $status);
        }

        if ($code != ''){
            $data = $data->where('code', $code);
        }
        return $data->paginate($limit);

        // if ($status != '') {
        //     return Ticket::where('status', $status)->paginate($limit);
        // } else {
        //     return Ticket::paginate($limit);
        // }
    }

    public function create($input)
    {
        return Ticket::create($input);
    }

    public function update(Ticket $model, $input)
    {
        return $model->update($input);
    }

    public function delete(Ticket $model)
    {
        return $model->delete();
    }

    public function getActive()
    {
        return Ticket::where('is_active', 1)->get();
    }

    public function getByStatus($status)
    {
        return Ticket::where('status', $status)->get();
    }
    
    public function updateStatus($ids, $input)
    {
        return Ticket::whereIn('id', $ids)
        ->update($input);
    }
    
    public function getByIds($ids)
    {
        return Ticket::whereIn('id', $ids)->get();
    }

    public function getReport($status, $download)
    {
        // $startDate = Carbon::parse($startDate)->format('Y-m-d');
        // $endDate = Carbon::parse($endDate)->format('Y-m-d');
        $data = Ticket::orderBy('id', 'desc');
        if ($status != '') {
            $data = $data->where('status', $status);
        }

        if ($download) {
            return $data->get();
        } else {
            return $data->paginate(50);
        }
    }

    public function deleteExpired() {
        return Ticket::where('status', 'expired')
                    ->limit(1000)
                    ->delete();
    }

    public function deleteUsedOld() {
        return Ticket::where('status', 'used')
                    ->whereHas('checkinObject', function($q) {
                        $q->whereDate('created_at', '<', date('Y-m-d'));
                    })
                    ->limit(1000)
                    ->delete();
                    
    }
}
