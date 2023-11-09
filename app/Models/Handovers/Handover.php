<?php

namespace App\Models\Handovers;

use Illuminate\Database\Eloquent\Model;
use Str;
use Carbon\Carbon;

class Handover extends Model
{
    protected $table = 'handovers';

	protected $guarded = ['id'];

    protected $primaryKey = 'id';

    protected $appends = ['status_display', 'created_at_display'];

    public function getStatusDisplayAttribute()
    {
        return ($this->status) ? Str::title($this->status) : '-'; 
    }

    public function getCreatedAtDisplayAttribute()
    {
        if ($this->created_at) {
            return Carbon::parse($this->created_at)->format('d F Y');
        } else {
            return '-';
        }
    }
}
