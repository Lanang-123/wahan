<?php

namespace App\Models\Tickets;

use Illuminate\Database\Eloquent\Model;
use Str;
use Helper;
use Carbon\Carbon;

class Ticket extends Model
{
    protected $table = 'tickets';

	protected $guarded = ['id'];

    protected $primaryKey = 'id';

    protected $appends = ['ticket_type_name', 'status_display', 'price', 'created_at_display', 'ticket_image'];

    public function order()
    {
        return $this->morphOne('App\Models\OrderItems\OrderItem', 'productable');
    }

    public function checkinObject()
    {
        return $this->hasOne('App\Models\CheckinObjects\CheckinObject', 'ticket_id', 'id');
    }

    public function ticketType()
    {
        return $this->belongsTo('App\Models\TicketTypes\TicketType');
    }

    public function getTicketTypeNameAttribute()
    {
        return ($this->ticketType) ? $this->ticketType->name : '-'; 
    }

    public function getStatusDisplayAttribute()
    {
        return ($this->status) ? Str::title($this->status) : '-'; 
    }

    public function getPriceAttribute()
    {
        return ($this->ticketType AND $this->ticketType->price) ? Helper::getAmountDisplay($this->ticketType->price) : '-'; 
    }

    public function getCreatedAtDisplayAttribute()
    {
        return Helper::formatDateIndo(Carbon::parse($this->created_at)->toDateString()); 
    }

    public function getTicketImageAttribute()
    {
        return ($this->ticketType) ? $this->ticketType->image : ''; 
    }

}
