<?php

namespace App\Models\CheckinParkings;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Carbon\CarbonInterval;
use Helper;

class CheckinParking extends Model
{
    protected $table = 'checkin_parking';

	protected $guarded = ['id'];

    protected $primaryKey = 'id';

    protected $appends = ['created_at_display', 'price_display', 'time_display', 'time_parking', 'duration_display'];

    public function carType()
    {
        return $this->belongsTo('App\Models\CarTypes\CarType');
    }

    public function getCreatedAtDisplayAttribute()
    {
        return Helper::formatDateIndo(Carbon::parse($this->created_at)->toDateString()); 
    }

    public function getTimeDisplayAttribute()
    {
        return Carbon::parse($this->created_at)->format('H:i'); 
    }

    public function getPriceDisplayAttribute()
    {
        return Helper::getAmountDisplay($this->price);
    }

    public function getTimeParkingAttribute()
    {
        return Carbon::parse($this->created_at)->format('H:i:s'); 
    }

    public function getDurationDisplayAttribute()
    {
       return CarbonInterval::minutes($this->duration)->cascade()->forHumans();
    }
}
