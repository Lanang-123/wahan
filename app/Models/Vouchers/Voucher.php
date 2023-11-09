<?php

namespace App\Models\Vouchers;

use Illuminate\Database\Eloquent\Model;
use Str;
use Helper;
use Carbon\Carbon;

class Voucher extends Model
{
    protected $table = 'vouchers';

	protected $guarded = ['id'];

    protected $primaryKey = 'id';

    protected $appends = ['ticket_type_name', 'status_display', 'nominal_display', 'created_at_display'];

    public function order()
    {
        return $this->morphOne('App\Models\OrderItems\OrderItem', 'productable');
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

    public function getNominalDisplayAttribute()
    {
        if ($this->type == 'amount') {
            return Helper::getAmountDisplay($this->nominal);
        } else {
            return $this->nominal.'%';
        }
    }

    public function getCreatedAtDisplayAttribute()
    {
        return Helper::formatDateIndo(Carbon::parse($this->created_at)->toDateString()); 
    }
}
