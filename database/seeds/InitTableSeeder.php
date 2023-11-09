<?php

use Illuminate\Database\Seeder;
use App\Models\TicketTypes\TicketType;
use App\Models\CarTypes\CarType;
use App\Models\Tickets\Ticket;
use App\Models\RideOwners\RideOwner;
use App\Models\Rides\Ride;
use App\Models\Guides\Guide;
use App\Models\Vouchers\Voucher;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Helper\Helper;

class InitTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ticketTypes = [[
            'name' => 'Reguler',
            'price' => 5000,
        ], [
            'name' => 'Pre Weddings',
            'price' => 10000
        ]];
        foreach ($ticketTypes as $item) {
            $ticketType = new TicketType;
            $ticketType->slug = Str::slug($item['name'], '-');
            $ticketType->name = Str::title($item['name']);
            $ticketType->price = $item['price'];
            $ticketType->save();
            
            for ($i=0; $i < 4; $i++) { 
                $ticket = new Ticket;
                $ticket->code = Helper::generateRandomString();
                $ticket->status = 'created';
                $ticket->ticket_type_id = $ticketType->id;
                $ticket->save();
            }

        }

        //voucher
        for ($i=0; $i < 20; $i++) { 
            $voucher = new Voucher;
            $voucher->code = Helper::generateRandomString();
            $voucher->type = config('constant.VOUCHER_TYPES')[0];
            $voucher->nominal = 10000;
            $voucher->status = 'created';
            $voucher->save();
        }

        $carTypes = [[
            'name' => 'Mini Bus',
            'price' => 5000,
        ], [
            'name' => 'Bus',
            'price' => 15000
        ], [
            'name' => 'Hiace',
            'price' => 10000
        ]];
        foreach ($carTypes as $key => $item) {
            $carType = new CarType;
            $carType->slug = Str::slug($item['name'], '-');
            $carType->name = $item['name'];
            $carType->price = $item['price'];
            $carType->save();
        }

        $rideOwners = ['Karl Mayer', 'Astor Ziegler', 'Volker Heinrich'];
        $rides = ['Halilintar', 'Ayunan Surga', 'Kora-kora'];
        foreach ($rideOwners as $key => $item) {
            $rideOwner = new RideOwner;
            $rideOwner->name = $item;
            $rideOwner->save();

            $ride = new Ride;
            $ride->ride_owner_id = $rideOwner->id;
            $ride->slug = Str::slug($rides[$key], '-');
            $ride->name = Str::title($rides[$key], '-');
            $ride->price = 10000;
            $ride->fee = 10;
            $ride->save();
        }

        $guide = new Guide;
        $guide->uuid = Str::uuid();
        $guide->id_card_number = '2147483647';
        $guide->member_number = '000001';
        $guide->name = 'Jhon Due';
        $guide->phone = '08177123456';
        $guide->have_bank_account = 1;
        $guide->bank_name = 'BANK BNI';
        $guide->bank_account_number = '1234567';
        $guide->bank_account_name = 'Jhon Due';
        $guide->save();

        $guide = new Guide;
        $guide->uuid = Str::uuid();
        $guide->id_card_number = '22334455';
        $guide->member_number = '000002';
        $guide->name = 'Martin Hans';
        $guide->phone = '081771234455';
        $guide->have_bank_account = 1;
        $guide->bank_name = 'BANK BCA';
        $guide->bank_account_number = '1234567';
        $guide->bank_account_name = 'Martin Hans';
        $guide->save();

        
    }
}
