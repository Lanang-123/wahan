<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rides\RideRepository as Ride;
use App\Models\RideOwners\RideOwnerRepository as RideOwner;
use App\Http\Requests\RideRequest;
use Str;

class RideController extends Controller
{
    public function __construct(Ride $rides, RideOwner $rideOwners) 
    {
        $this->routeIndex = route('ride-list');
        $this->rides = $rides;
        $this->rideOwners = $rideOwners;
    }

    public function index()
    {
        $data = $this->rides->get();
        
        
        return view('pages.rides.index', compact('data'));
    }

    public function form($slug = null)
    {
        $item = null;
        if ($slug) {
            $item = $this->rides->getBySlug($slug);
            if (!$item) {
                return redirect($this->routeIndex)->with(['error'=> 'Data tidak dapat ditemukan']);
            }
        }
        $rideOwners = $this->rideOwners->get();
        return view('pages.rides.form', compact('item', 'rideOwners'));
    }

    public function create(RideRequest $request)
    {
        $name = $request->input('name');
        $rideOwnerId = $request->input('ride_owner_id');
        $fee = $request->input('fee');
        $price = $request->input('price');
        $is_active = (int) $request->input('is_active');

        $input = [
            'slug' => Str::slug($name, '-'),
            'name' => Str::title($name),
            'ride_owner_id' => $rideOwnerId,
            'price' => $price,
            'fee' => $fee,
            'is_active' => $is_active,
        ];
        $this->rides->create($input);

        return redirect($this->routeIndex)->with(['success'=> 'Data berhasil ditambahkan.']);
    }

    public function update(RideRequest $request, $slug)
    {
        $name = $request->input('name');
        $price = $request->input('price');
        $rideOwnerId = $request->input('ride_owner_id');
        $fee = $request->input('fee');
        $is_active = (int) $request->input('is_active');

        $item = $this->rides->getBySlug($slug);
        if (!$item) {
            return redirect($this->routeIndex)->with(['error'=> 'Data tidak dapat ditemukan']);
        }

        $input = [
            'slug' => Str::slug($name, '-'),
            'name' => Str::title($name),
            'ride_owner_id' => $rideOwnerId,
            'price' => $price,
            'fee' => $fee,
            'is_active' => $is_active,
        ];
        $this->rides->update($item, $input);
        return redirect($this->routeIndex)->with(['success'=> 'Data berhasil diubah.']);
    }

    public function delete($slug)
    {
        $item = $this->rides->getBySlug($slug);
        if (!$item) {
            return redirect($this->routeIndex)->with(['error'=> 'Data tidak dapat ditemukan']);
        }
        $this->rides->delete($item);
        return redirect($this->routeIndex)->with(['success'=> 'Data berhasil dihapus.']);
    }
}
