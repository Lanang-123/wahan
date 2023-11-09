<?php

namespace App\Models\OrderItems;

use Illuminate\Database\Eloquent\Model;
use Helper;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderItem extends Model
{
    use SoftDeletes;

    protected $table = 'order_items';

	protected $guarded = ['id'];

    protected $primaryKey = 'id';

    protected $appends = ['price_display', 'code', 'created_at_display'];

    public function productable()
    {
        return $this->morphTo('productable', 'product_type', 'priduct_id');
    }

    public function order()
    {
        return $this->belongsTo('App\Models\Orders\Order');
    }

    public function checkinRides()
    {
        return $this->hasMany('App\Models\CheckinRides\CheckinRide', 'order_item_id', 'id');
    }

    public function checkinObject()
    {
        return $this->hasOne('App\Models\CheckinObjects\CheckinObject', 'order_item_id', 'id');
    }

    public function getPriceDisplayAttribute()
    {
        return Helper::getAmountDisplay($this->price);
    }

    public function getCodeAttribute()
    {
        $data = json_decode($this->product_data);
        return ($data) ? $data->code : '';
    }

    public function getCreatedAtDisplayAttribute()
    {
        return Helper::formatDateIndo(Carbon::parse($this->created_at)->toDateString()); 
    }
}
