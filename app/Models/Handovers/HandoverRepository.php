<?php

namespace App\Models\Handovers;

class HandoverRepository
{
    public function find($id)
    {
        return Handover::find($id);
    }

    public function getByUuid($uuid)
    {
        return Handover::where('uuid', $uuid)->first();
    }

    public function getBySlug($slug)
    {
        return Handover::where('slug', $slug)->first();
    }

    public function get()
    {
        return Handover::get();
    }
    
    public function create($input)
    {
        return Handover::create($input);
    }
    
    public function update(Handover $model, $input)
    {
        return $model->update($input);
    }
    
    public function delete(Handover $model)
    {
        return $model->delete();
    }
    
    public function getActive()
    {
        return Handover::where('is_active', 1)->get();
    }

    public function getByStatus($status)
    {
        return Handover::where('status', $status)
                        ->get();
    }
}
