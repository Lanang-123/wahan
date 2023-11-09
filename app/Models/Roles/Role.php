<?php

namespace App\Models\Roles;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'roles';

	protected $guarded = ['id'];

    protected $primaryKey = 'id';
}
