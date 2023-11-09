<?php

namespace App\Models\FeeTransfers;

use Illuminate\Database\Eloquent\Model;
use Helper;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Orders\Order;


class FeeTransfer extends Model
{
    protected $table = 'fee_transfers';

    protected $guarded = ['id'];

    protected $primaryKey = 'id';

    protected $appends = ['created_at_display', 'total_display', 'bank_name', 'bank_account_number', 'bank_account_name'];

    public function guide()
    {
        return $this->belongsTo('App\Models\Guides\Guide');
    }

    public function getTicketTypeNameAttribute()
    {
        return ($this->ticketType) ? $this->ticketType->name : '-';
    }

    public function getStatusDisplayAttribute()
    {
        return ($this->status) ? Str::title($this->status) : '-';
    }

    public function getTotalDisplayAttribute()
    {
        return Helper::getAmountDisplay($this->total);
    }


    public function getCreatedAtDisplayAttribute()
    {
        return Helper::formatDateIndo(Carbon::parse($this->created_at)->toDateString());
    }

    public function getBankNameAttribute()
    {
        return ($this->payment_type == 'transfer') ? $this->guide->bank_name : '-';
    }

    public function getBankAccountNumberAttribute()
    {
        return ($this->payment_type == 'transfer') ? $this->guide->bank_account_number : '-';
    }

    public function getBankAccountNameAttribute()
    {
        return ($this->payment_type == 'transfer') ? $this->guide->bank_account_name : '-';
    }

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class, 'order_id', 'id');
    }


}
