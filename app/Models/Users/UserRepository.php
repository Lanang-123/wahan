<?php

namespace App\Models\Users;

class UserRepository
{
    public function getByEmail($email)
    {
        return User::where('email', $email)->first();
    }

    public function find($id)
    {
        return User::find($id);
    }

    public function getByUuid($uuid)
    {
        return User::where('uuid', $uuid)->first();
    }

    public function get()
    {
        return User::get();
    }

    public function create($input)
    {
        return User::create($input);
    }

    public function update(User $model, $input)
    {
        return $model->update($input);
    }

    public function delete(User $model)
    {
        return $model->delete();
    }
}
