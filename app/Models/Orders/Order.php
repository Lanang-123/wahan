<?php

namespace App\Models\Orders;

use Illuminate\Database\Eloquent\Model;
use Helper;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use SoftDeletes;

    protected $table = 'orders';

	protected $guarded = ['id'];

    protected $primaryKey = 'id';

    protected $appends = ['total_ticket', 'total_voucher', 'total_price_ticket', 'total_price_voucher', 'created_at_display', 'status_fee_display', 'guide_name', 'guide_fee', 'total_price_display', 'guide_fee_checkin_ride_display', 'guide_fee_checkin_object_display', 'total_guide_fee', 'total_guide_fee_display', 'total_price_checkin_ride_display'];

    public function guide()
    {
        return $this->belongsTo('App\Models\Guides\Guide');
    }

    public function parking()
    {
        return $this->belongsTo('App\Models\CheckinParkings\CheckinParking', 'parking_id', 'id');
    }

    public function items()
    {
        return $this->hasMany('App\Models\OrderItems\OrderItem', 'order_id', 'id');
    }

    public function getGuideNameAttribute()
    {
        return ($this->guide) ? $this->guide->name : '-'; 
    }

    public function getGuideCommision($arr, $field)
    {
        $total = 0;
        $items = $arr;
        if ($items AND count($items) > 0) {
            foreach ($items as $ket => $item) {
               $checkinRides = $item->checkinRides;
               if ($checkinRides AND count($checkinRides) > 0) {
                   foreach ($checkinRides as $checkin) {
                       $total += $checkin[$field];
                   }
               }
            }
        }
        return $total;
    }
    public function getGuideFeeAttribute()
    {
        $items = $this->items;
        return $this->getGuideCommision($items, 'amount_fee');
    }

    public function getTotalPriceCheckinRideAttribute()
    {
        $items = $this->items;
        return $this->getGuideCommision($items, 'price');
    }

    public function getGuideFeeCheckinObjectAttribute()
    {
        $items = $this->items;
        $total = 0;
        if ($items AND count($items) > 0) {
            foreach ($items as $ket => $item) {
               $checkinObject = $item->checkinObject;
               if ($checkinObject) {
                   $total += $checkinObject['amount_fee'];
               }
            }
        }
        return $total;
    }

    public function getGuideFeeCheckinObjectDisplayAttribute()
    {
        return Helper::getAmountDisplay($this->getGuideFeeCheckinObjectAttribute());
    }

    public function getTotalGuideFeeAttribute()
    {
        return $this->getGuideFeeCheckinObjectAttribute() + $this->getGuideFeeAttribute();
    }

    public function getTotalGuideFeeDisplayAttribute()
    {
        return Helper::getAmountDisplay($this->getTotalGuideFeeAttribute());
    }

    public function getTotalPriceDisplayAttribute()
    {
        return Helper::getAmountDisplay($this->total_price);
    }

    public function getGuideFeeCheckinRideDisplayAttribute()
    {
        return Helper::getAmountDisplay($this->getGuideFeeAttribute());
    }

    public function getTotalPriceCheckinRideDisplayAttribute()
    {
        return Helper::getAmountDisplay($this->getTotalPriceCheckinRideAttribute());
    }

    public function getCreatedAtDisplayAttribute()
    {
        return Helper::formatDateIndo(Carbon::parse($this->created_at)->toDateString()); 
    }

    public function getStatusFeeDisplayAttribute()
    {
        if ($this->use_guide) {
            if ($this->already_transfer_fee) {
                return 'Selesai';
            } else {
                return 'Proses';
            }
        } else {
            return '-';
        } 
    }

    public function getTotalTicketAttribute()
    {
        $items = $this->items;
        return $this->getTotal($items, 'ticket');
    }

    public function getTotalVoucherAttribute()
    {
        $items = $this->items;
        return $this->getTotal($items, 'voucher');
    }

    public function getTotalPriceTicketAttribute()
    {
        $items = $this->items;
        return $this->getTotal($items, 'ticket', 'price');
    }

    public function getTotalPriceVoucherAttribute()
    {
        $items = $this->items;
        return $this->getTotal($items, 'voucher', 'price');
    }

    public function getTotalPriceTicketDisplayAttribute()
    {
        $items = $this->items;
        return Helper::getAmountDisplay($this->getTotal($items, 'ticket', 'price'));
    }

    public function getTotalPriceVoucherDisplayAttribute()
    {
        $items = $this->items;
        return Helper::getAmountDisplay($this->getTotal($items, 'voucher', 'price'));
    }

    public function getTotal($data, $type, $field = null) 
    {
        $total = 0;
        if ($data AND count($data) > 0) {
            foreach ($data as $key => $item) {
                if ($item->product_type == $type) {
                    if ($field == 'price') {
                        $total += $item->price;
                    } else {
                        $total++;
                    }
                }
            }
        }
        return $total;
    }

}
