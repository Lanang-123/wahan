<?php

use Illuminate\Database\Seeder;
use App\Models\Configs\Config;
use Illuminate\Support\Str;
use Carbon\Carbon;

class ConfigTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $item = new Config;
		$item->name = 'order_number';
		$item->int_val = 1;
		$item->save();

        $item = new Config;
		$item->name = 'ticket_expiration';
		$item->int_val = 24;
		$item->save();
    }
}
