<?php

namespace App\Models\CheckinObjects;

use Illuminate\Database\Eloquent\Model;
use Helper;
use Carbon\Carbon;

class CheckinObject extends Model
{
    protected $table = 'checkin_object';

	protected $guarded = ['id'];

    protected $primaryKey = 'id';

    protected $appends = ['created_at_display', 'ticket_number', 'checkin_time', 'checkout_time'];

    public function getCreatedAtDisplayAttribute()
    {
        return Helper::formatDateIndo(Carbon::parse($this->created_at)->toDateString()); 
    }

    public function orderItem()
    {
        return $this->hasOne('App\Models\OrderItems\OrderItem', 'id', 'order_item_id');
    }

    public function getTicketNumberAttribute()
    {
        if ($this->orderItem AND $this->orderItem->product_data) {
            $ticket = json_decode($this->orderItem->product_data);
            return $ticket->code;
        }
        return '';
    }

    public function getCheckinTimeAttribute()
    {
        return ($this->orderItem AND $this->orderItem->checkin_time) ? Carbon::parse($this->orderItem->checkin_time)->format('H:i'): '';
    }

    public function getCheckoutTimeAttribute()
    {
        return ($this->orderItem AND $this->orderItem->checkout_time) ? Carbon::parse($this->orderItem->checkout_time)->format('H:i'): '';
    }
}
