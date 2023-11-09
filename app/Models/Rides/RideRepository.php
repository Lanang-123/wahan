<?php

namespace App\Models\Rides;

class RideRepository
{
    public function find($id)
    {
        return Ride::find($id);
    }

    public function getByUuid($uuid)
    {
        return Ride::where('uuid', $uuid)->first();
    }

    public function getBySlug($slug)
    {
        return Ride::where('slug', $slug)->first();
    }

    public function get()
    {
        return Ride::get();
    }

    public function create($input)
    {
        return Ride::create($input);
    }

    public function update(Ride $model, $input)
    {
        return $model->update($input);
    }

    public function delete(Ride $model)
    {
        return $model->delete();
    }

    public function getActive()
    {
        return Ride::where('is_active', 1)->get();
    }
}
