<?php

namespace App\Models\TicketTypes;

class TicketTypeRepository
{
    public function find($id)
    {
        return TicketType::find($id);
    }

    public function getBySlug($slug)
    {
        return TicketType::where('slug', $slug)->first();
    }

    public function get()
    {
        return TicketType::get();
    }

    public function create($input)
    {
        return TicketType::create($input);
    }

    public function update(TicketType $model, $input)
    {
        return $model->update($input);
    }

    public function delete(TicketType $model)
    {
        return $model->delete();
    }

    public function getActive()
    {
        return TicketType::where('is_active', 1)->get();
    }
}
