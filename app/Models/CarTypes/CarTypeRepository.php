<?php

namespace App\Models\CarTypes;

class CarTypeRepository
{
    public function find($id)
    {
        return CarType::find($id);
    }

    public function getByUuid($uuid)
    {
        return CarType::where('uuid', $uuid)->first();
    }

    public function getBySlug($slug)
    {
        return CarType::where('slug', $slug)->first();
    }

    public function get()
    {
        return CarType::get();
    }

    public function create($input)
    {
        return CarType::create($input);
    }

    public function update(CarType $model, $input)
    {
        return $model->update($input);
    }

    public function delete(CarType $model)
    {
        return $model->delete();
    }

    public function getActive()
    {
        return CarType::where('is_active', 1)->get();
    }
}
