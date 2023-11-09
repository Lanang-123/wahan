<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CarTypes\CarTypeRepository as CarType;
use App\Http\Requests\CarTypeRequest;
use Str;

class CarTypeController extends Controller
{
    public function __construct(CarType $carTypes) 
    {
        $this->routeIndex = route('car-type-list');
        $this->carTypes = $carTypes;
    }

    public function index()
    {
        $data = $this->carTypes->get();
        return view('pages.carTypes.index', compact('data'));
    }

    public function form($slug = null)
    {
        $item = null;
        if ($slug) {
            $item = $this->carTypes->getBySlug($slug);
            if (!$item) {
                return redirect($this->routeIndex)->with(['error'=> 'Data tidak dapat ditemukan']);
            }
        }
        return view('pages.carTypes.form', compact('item'));
    }

    public function create(CarTypeRequest $request)
    {
        $name = $request->input('name');
        $price = $request->input('price');
        $is_active = (int) $request->input('is_active');

        $input = [
            'slug' => Str::slug($name, '-'),
            'name' => Str::title($name),
            'price' => $price,
            'is_active' => $is_active,
        ];
        $this->carTypes->create($input);

        return redirect($this->routeIndex)->with(['success'=> 'Data berhasil ditambahkan.']);
    }

    public function update(CarTypeRequest $request, $slug)
    {
        $name = $request->input('name');
        $price = $request->input('price');
        $is_active = (int) $request->input('is_active');

        $item = $this->carTypes->getBySlug($slug);
        if (!$item) {
            return redirect($this->routeIndex)->with(['error'=> 'Data tidak dapat ditemukan']);
        }

        $input = [
            'slug' => Str::slug($name, '-'),
            'name' => Str::title($name),
            'price' => $price,
            'is_active' => $is_active,
        ];
        $this->carTypes->update($item, $input);
        return redirect($this->routeIndex)->with(['success'=> 'Data berhasil diubah.']);
    }

    public function delete($slug)
    {
        $item = $this->carTypes->getBySlug($slug);
        if (!$item) {
            return redirect($this->routeIndex)->with(['error'=> 'Data tidak dapat ditemukan']);
        }
        $this->carTypes->delete($item);
        return redirect($this->routeIndex)->with(['success'=> 'Data berhasil dihapus.']);
    }
}
