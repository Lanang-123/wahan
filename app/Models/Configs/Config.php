<?php

namespace App\Models\Configs;

use Illuminate\Database\Eloquent\Model;

class Config extends Model
{
    protected $table = 'configs';

	protected $guarded = ['id'];

    protected $primaryKey = 'id';
}
