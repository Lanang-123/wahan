<?php

namespace App\Models\Guides;

use Illuminate\Database\Eloquent\Model;

class Guide extends Model
{
    protected $table = 'guides';

	protected $guarded = ['id'];

    protected $primaryKey = 'id';

    protected $appends = [];
}
