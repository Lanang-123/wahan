<?php

namespace App\Models\CarTypes;

use Illuminate\Database\Eloquent\Model;
use App\Helper\Helper;

class CarType extends Model
{
    protected $table = 'car_types';

	protected $guarded = ['id'];

    protected $primaryKey = 'id';

    protected $appends = ['price_display'];

    public function getPriceDisplayAttribute()
    {
        return Helper::getAmountDisplay($this->price);
    }
}
