<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CarTypes\CarTypeRepository as CarType;
use App\Models\CheckinParkings\CheckinParkingRepository as CheckinParking;
use App\Models\Tickets\TicketRepository as Ticket;
use App\Models\Rides\RideRepository as Ride;
use App\Models\OrderItems\OrderItemRepository as OrderItem;
use App\Models\CheckinRides\CheckinRideRepository as CheckinRide;
use App\Models\CheckinObjects\CheckinObjectRepository as CheckinObject;
use App\Models\Configs\ConfigRepository as Config;
use Helper;
use App\Http\Requests\ParkingRequest;
use App\Http\Requests\ObjectRequest;
use App\Http\Requests\CheckinRideRequest;
use Str;
use DB;
use Carbon\Carbon;

class CheckinController extends Controller
{
    public function __construct(Config $configs, CheckinObject $checkinObjects, CheckinRide $checkinRides, OrderItem $orderItems, Ride $rides, Ticket $tickets, CarType $carTypes, CheckinParking $checkinParkings)
    {
        $this->carTypes = $carTypes;
        $this->checkinParkings = $checkinParkings;
        $this->tickets = $tickets;
        $this->rides = $rides;
        $this->orderItems = $orderItems;
        $this->checkinRides = $checkinRides;
        $this->checkinObjects = $checkinObjects;
        $this->configs = $configs;
    }

    public function parkingForm()
    {
        $carTypes = $this->carTypes->getActive();
        $path = public_path('json/country.json');
        $countries = json_decode(file_get_contents($path), true);
        return view('pages.checkins.parking', compact('carTypes', 'countries'));
    }

    public function parkingCreate(ParkingRequest $request)
    {
        $car_type_id = $request->input('car_type_id');
        $police_number = $request->input('police_number');
        $total_passengers = $request->input('total_passengers');
        $country = $request->input('country');
        $traveler_type = $request->input('traveler_type');
        $is_fee = (int) $request->input('is_fee');

        $car_type = $this->carTypes->find($car_type_id);
        if (empty($car_type)) {
            return redirect(route('new-parking'))->with(['error'=> 'Data jenis kendaraan tidak dapat ditemukan']);
        }
        $price = $car_type->price;

        $input = [
            'checkin_number' => 0,
            'car_type_id' => $car_type_id,
            'police_number' => str_replace(' ', '', Str::upper($police_number)),
            'total_passengers' => $total_passengers,
            'is_fee' => $is_fee,
            'traveler_type' => $traveler_type,
            'price' => $price,
            'image' => 'test.jpg',
            'country' => $country
        ];
        $item = $this->checkinParkings->create($input);
        if ($item) {
            $input = ['checkin_number' => Helper::getMemberNumber($item->id)];
            $this->checkinParkings->update($item, $input);
            return redirect(route('print-parking', ['id' => $item->id]));
        } else {
            return redirect(route('new-parking'))->with(['error'=> 'Terjadi kesalahan saat input database']);

        }

    }

    public function parkingPrint($id)
    {
        $item = $this->checkinParkings->find($id);
        if (!$item) {

        }
        return view('pages.checkins.parking-print', compact('item'));
    }

    public function objectForm()
    {
        return view('pages.checkins.object');
    }

    public function objectCreate(ObjectRequest $request)
    {
        $code = $request->input('code');
        $item = $this->tickets->checkin($code, 'in-use');

        if (!$item OR !$item->ticketType) {
            return redirect(route('new-object'))->with(['error'=> 'Data tiket tidak dapat ditemukan']);
        }
        
        $orderItem = $this->orderItems->getByTypeAndId('ticket', $item->id);
        if (!$item) {
            return redirect(route('new-object'))->with(['error'=> 'Data order item tidak dapat ditemukan']);
        }
        DB::beginTransaction();
        try {
            $fee = round(($item->ticketType->fee * $item->ticketType->price/100), 1);
            $inputObject = [
                'ticket_id' => $item->id,
                'order_item_id' => $orderItem->id,
                'use_guide' => $orderItem->order->use_guide,
                'guide_id' => $orderItem->order->guide_id,
                'price' => $item->ticketType->price,
                'amount_fee' => $fee,
            ];
            $this->checkinObjects->create($inputObject);
    
            $this->tickets->update($item, ['status' => 'used']);
            $this->orderItems->update($orderItem, ['checkin_time' => Carbon::now()]);
            DB::commit();
            return redirect(route('new-object'))->with(['success'=> 'Check in object berhasil']);
        } catch (\Throwable $th) {
            DB::rollback();
            return redirect(route('new-object'))->with(['error'=> $th.'Terjadi kesalahan saat input ke database']);
        }
    }

    public function rideForm()
    {
        $rides = $this->rides->getActive();
        return view('pages.checkins.ride', compact('rides'));
    }

    public function rideCreate(CheckinRideRequest $request)
    {
        $ride_id = $request->input('ride_id');
        $code = $request->input('code');

        $ride = $this->rides->find($ride_id);
        if (!$ride) {
            return redirect(route('new-checkin-ride'))->with(['error'=> 'Data wahana tidak dapat ditemukan']);
        }

        $item = $this->tickets->checkin($code, 'used');

        if (!$item) {
            return redirect(route('new-checkin-ride'))->with(['error'=> 'Data tiket tidak dapat ditemukan']);
        }

        $orderItem = $this->orderItems->getByTypeAndId('ticket', $item->id);
        if (!$orderItem) {
            return redirect(route('new-checkin-ride'))->with(['error'=> 'Data order tiket tidak dapat ditemukan']);
        }

        $checkinTime = $orderItem->checkin_time;
        $currentTime = Carbon::now();
        $diffHour = $currentTime->diffInHours($checkinTime);
        $ticket_expiration = $this->configs->getValByName('int_val', 'ticket_expiration');

        if ($diffHour > $ticket_expiration) {
            $this->tickets->update($item, ['status' => 'expired']);
            $this->orderItems->update($orderItem, ['checkout_time' => Carbon::now()]);
            return redirect(route('new-checkin-ride'))->with(['error'=> 'Masa berlaku tiket sudah berakhir']);
        }

        $fee = round(($ride->fee * $ride->price/100), 1);
        $input = [
            'ride_id' => $ride->id,
            'ticket_id' => $item->id,
            'order_item_id' => $orderItem->id,
            'use_guide' => $orderItem->order->use_guide,
            'guide_id' => $orderItem->order->guide_id,
            'price' => $ride->price,
            'amount_fee' => $fee,
        ];

        $item = $this->checkinRides->create($input);

        return redirect(route('new-checkin-ride'))->with(['success'=> 'Data berhasil ditambahkan']);
    }
}
