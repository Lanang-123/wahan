<?php

namespace App\Models\TicketTypes;

use Illuminate\Database\Eloquent\Model;
use App\Helper\Helper;

class TicketType extends Model
{
    protected $table = 'ticket_types';

	protected $guarded = ['id'];

    protected $primaryKey = 'id';

    protected $appends = ['price_display', 'fee_display'];

    public function getPriceDisplayAttribute()
    {
        return Helper::getAmountDisplay($this->price);
    }

    public function getFeeDisplayAttribute()
    {
        return Helper::getPercentDisplay($this->fee);
    }

    public function getImageAttribute($val)
    {
        if ($val) {
            return asset('storage/image/'.$val);
        } else {
            return "";
        }
    }
}
