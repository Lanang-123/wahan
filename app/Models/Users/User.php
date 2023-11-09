<?php

namespace App\Models\Users;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'users';

	protected $guarded = ['id'];

    protected $primaryKey = 'id';

    protected $appends = ['role_name'];

    public function role()
    {
        return $this->belongsTo('App\Models\Roles\Role');
    }

    public function getRoleNameAttribute()
    {
        if ($this->role_id == 0) {
            return 'Super Admin';
        } else {
            return ($this->role) ? $this->role->name : '-';
        }
    }
}
