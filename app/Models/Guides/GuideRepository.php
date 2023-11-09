<?php

namespace App\Models\Guides;

class GuideRepository
{
    public function find($id)
    {
        return Guide::find($id);
    }

    public function getByUuid($uuid)
    {
        return Guide::where('uuid', $uuid)->first();
    }

    public function getBySlug($slug)
    {
        return Guide::where('slug', $slug)->first();
    }

    public function get()
    {
        return Guide::get();
    }

    public function getFirst()
    {
        return Guide::first();
    }

    public function create($input)
    {
        return Guide::create($input);
    }

    public function update(Guide $model, $input)
    {
        return $model->update($input);
    }

    public function delete(Guide $model)
    {
        return $model->delete();
    }

    public function getActive()
    {
        return Guide::where('is_active', 1)->get();
    }
}
