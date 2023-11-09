<?php

namespace App\Models\CheckinRides;

use Illuminate\Database\Eloquent\Model;
use Helper;
use Carbon\Carbon;

class CheckinRide extends Model
{
    protected $table = 'checkin_rides';

	protected $guarded = ['id'];

    protected $primaryKey = 'id';

    protected $appends = ['created_at_display'];

    public function ride()
    {
        return $this->belongsTo('App\Models\Rides\Ride');
    }

    public function getTicketTypeNameAttribute()
    {
        return ($this->ticketType) ? $this->ticketType->name : '-'; 
    }

    public function getStatusDisplayAttribute()
    {
        return ($this->status) ? Str::title($this->status) : '-'; 
    }

    public function getCreatedAtDisplayAttribute()
    {
        return Helper::formatDateIndo(Carbon::parse($this->created_at)->toDateString()); 
    }
}
