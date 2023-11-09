<?php

namespace App\Models\Roles;

class RoleRepository
{
    public function find($id)
    {
        return Role::find($id);
    }

    public function getByUuid($uuid)
    {
        return Role::where('uuid', $uuid)->first();
    }

    public function get()
    {
        return Role::get();
    }

    public function create($input)
    {
        return Role::create($input);
    }

    public function update(Role $model, $input)
    {
        return $model->update($input);
    }

    public function delete(Role $model)
    {
        return $model->delete();
    }
}
