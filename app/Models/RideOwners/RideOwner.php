<?php

namespace App\Models\RideOwners;

use Illuminate\Database\Eloquent\Model;

class RideOwner extends Model
{
    protected $table = 'ride_owners';

	protected $guarded = ['id'];

    protected $primaryKey = 'id';

    protected $appends = [];
}
