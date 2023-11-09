<?php

namespace App\Models\Rides;

use Illuminate\Database\Eloquent\Model;
use App\Helper\Helper;

class Ride extends Model
{
    protected $table = 'rides';

	protected $guarded = ['id'];

    protected $primaryKey = 'id';

    protected $appends = ['price_display', 'fee_display', 'owner_name'];

    public function rideOwner()
    {
        return $this->belongsTo('App\Models\RideOwners\RideOwner');
    }

    public function getPriceDisplayAttribute()
    {
        return Helper::getAmountDisplay($this->price);
    }

    public function getFeeDisplayAttribute()
    {
        return Helper::getPercentDisplay($this->fee);
    }

    public function getOwnerNameAttribute()
    {
        return ($this->rideOwner()) ? $this->rideOwner->name : '-';
    }
}
