<?php

namespace App\Models\RideOwners;

class RideOwnerRepository
{
    public function find($id)
    {
        return RideOwner::find($id);
    }

    public function getByUuid($uuid)
    {
        return RideOwner::where('uuid', $uuid)->first();
    }

    public function getBySlug($slug)
    {
        return RideOwner::where('slug', $slug)->first();
    }

    public function get()
    {
        return RideOwner::get();
    }

    public function create($input)
    {
        return RideOwner::create($input);
    }

    public function update(RideOwner $model, $input)
    {
        return $model->update($input);
    }

    public function delete(RideOwner $model)
    {
        return $model->delete();
    }

    public function getActive()
    {
        return RideOwner::where('is_active', 1)->get();
    }
}
