<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RideOwners\RideOwnerRepository as RideOwner;
use App\Http\Requests\RideOwnerRequest;
use Str;


class RideOwnerController extends Controller
{
    public function __construct(RideOwner $rideOwners) 
    {
        $this->routeIndex = route('ride-owner-list');
        $this->rideOwners = $rideOwners;
    }

    public function index()
    {
        $data = $this->rideOwners->get();
        return view('pages.rideOwners.index', compact('data'));
    }

    public function form($uuid = null)
    {
        $item = null;
        if ($uuid) {
            $item = $this->rideOwners->getByUuid($uuid);
            if (!$item) {
                return redirect($this->routeIndex)->with(['error'=> 'Data tidak dapat ditemukan']);
            }
        }
        return view('pages.rideOwners.form', compact('item'));
    }

    public function create(RideOwnerRequest $request)
    {
        $name = $request->input('name');
        $is_active = (int) $request->input('is_active');

        $input = [
            'uuid' => Str::uuid(),
            'name' => Str::title($name),
            'is_active' => $is_active,
        ];
        $this->rideOwners->create($input);

        return redirect($this->routeIndex)->with(['success'=> 'Data berhasil ditambahkan.']);
    }

    public function update(RideOwnerRequest $request, $uuid)
    {
        $name = $request->input('name');
        $price = $request->input('price');
        $is_active = (int) $request->input('is_active');

        $item = $this->rideOwners->getByUuid($uuid);
        if (!$item) {
            return redirect($this->routeIndex)->with(['error'=> 'Data tidak dapat ditemukan']);
        }

        $input = [
            'uuid' => Str::uuid(),
            'name' => Str::title($name),
            'is_active' => $is_active,
        ];
        $this->rideOwners->update($item, $input);
        return redirect($this->routeIndex)->with(['success'=> 'Data berhasil diubah.']);
    }

    public function delete($uuid)
    {
        $item = $this->rideOwners->getByUuid($uuid);
        if (!$item) {
            return redirect($this->routeIndex)->with(['error'=> 'Data tidak dapat ditemukan']);
        }
        $this->rideOwners->delete($item);
        return redirect($this->routeIndex)->with(['success'=> 'Data berhasil dihapus.']);
    }
}
