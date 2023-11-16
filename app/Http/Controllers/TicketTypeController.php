<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TicketTypes\TicketTypeRepository as TicketType;
use App\Http\Requests\TicketTypeRequest;
use Str;
use Helper;

class TicketTypeController extends Controller
{
    public function __construct(TicketType $ticketTypes)
    {
        $this->routeIndex = route('ticket-type-list');
        $this->ticketTypes = $ticketTypes;
    }

    public function index()
    {
        $data = $this->ticketTypes->get();
        return view('pages.ticketTypes.index', compact('data'));
    }

    public function form($slug = null)
    {
        $item = null;
        if ($slug) {
            $item = $this->ticketTypes->getBySlug($slug);
            if (!$item) {
                return redirect($this->routeIndex)->with(['error' => 'Data tidak dapat ditemukan']);
            }
        }
        return view('pages.ticketTypes.form', compact('item'));
    }

    public function create(TicketTypeRequest $request)
    {
        $name = $request->input('name');
        $price = $request->input('price');
        $fee = $request->input('fee');
        $image = $request->file('image');
        $is_active = (int) $request->input('is_active');

        $input = [
            'slug' => Str::slug($name, '-'),
            'name' => Str::title($name),
            'price' => $price,
            'fee' => $fee,
            'is_active' => $is_active,
        ];
        if ($image) {
            $imageName = $this->generateUploadImage($image);
            $input['image'] = $imageName;
        }
        $this->ticketTypes->create($input);

        return redirect($this->routeIndex)->with(['success' => 'Data berhasil ditambahkan.']);
    }

    public function update(TicketTypeRequest $request, $slug)
    {
        $name = $request->input('name');
        $price = $request->input('price');
        $fee = $request->input('fee');
        $image = $request->file('image');
        $is_active = (int) $request->input('is_active');

        $item = $this->ticketTypes->getBySlug($slug);
        if (!$item) {
            return redirect($this->routeIndex)->with(['error' => 'Data tidak dapat ditemukan']);
        }

        $input = [
            'slug' => Str::slug($name, '-'),
            'name' => Str::title($name),
            'price' => $price,
            'fee' => $fee,
            'is_active' => $is_active,
        ];
        if ($image) {
            $imageName = $this->generateUploadImage($image);
            $input['image'] = $imageName;
        }
        $this->ticketTypes->update($item, $input);
        return redirect($this->routeIndex)->with(['success' => 'Data berhasil diubah.']);
    }

    public function delete($slug)
    {
        $item = $this->ticketTypes->getBySlug($slug);
        if (!$item) {
            return redirect($this->routeIndex)->with(['error' => 'Data tidak dapat ditemukan']);
        }
        $this->ticketTypes->delete($item);
        return redirect($this->routeIndex)->with(['success' => 'Data berhasil dihapus.']);
    }
    public function showImage($imageName)
    {
        $path = storage_path('app/public/image/' . $imageName);

        if (!file_exists($path)) {
            abort(404);
        }

        $file = file_get_contents($path);

        $imageInfo = getimagesize($path);
        $contentType = $imageInfo['mime'];

        return response($file, 200)->header('Content-Type', $contentType);
    }



    private function generateUploadImage($image)
    {
        $ext = $image->getClientOriginalExtension();
        $imageName = Str::uuid() . '.' . $ext;
        Helper::uploadImage('image/', $image, $imageName);
        return $imageName;
    }
}
