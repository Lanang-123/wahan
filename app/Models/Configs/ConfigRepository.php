<?php

namespace App\Models\Configs;

class ConfigRepository
{
    public function find($id)
    {
        return Config::find($id);
    }

    public function getByName($name)
    {
        return Config::where('name', $name)->first();
    }

    public function getValByName($field, $name)
    {
        return Config::where('name', $name)->pluck($field)->first();
    }

    public function get()
    {
        return Config::get();
    }

    public function create($input)
    {
        return Config::create($input);
    }

    public function update(Config $model, $input)
    {
        return $model->update($input);
    }

    public function delete(Config $model)
    {
        return $model->delete();
    }

    public function incrementOrderNumber()
    {
        return Config::where('name', 'order_number')->increment('int_val');
    }

    public function resetOrderNumber()
    {
        return Config::where('name', 'order_number')->update(['int_val' => 1]);
    }

}
