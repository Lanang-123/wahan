<?php

use Illuminate\Database\Seeder;

class RemoveDataTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::transaction(function () {
            DB::table('users')->truncate();
            DB::table('roles')->truncate();
            DB::table('configs')->truncate();
            DB::table('ticket_types')->truncate();
            DB::table('tickets')->truncate();
            DB::table('car_types')->truncate();
            DB::table('checkin_object')->truncate();
            DB::table('checkin_parking')->truncate();
            DB::table('checkin_rides')->truncate();
            DB::table('orders')->truncate();
            DB::table('order_items')->truncate();
            DB::table('rides')->truncate();
            DB::table('ride_owners')->truncate();
            DB::table('vouchers')->truncate();
            DB::table('guides')->truncate();
            DB::table('handovers')->truncate();
            DB::table('fee_transfers')->truncate();
        });
    }
}
