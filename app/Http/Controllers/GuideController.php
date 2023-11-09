<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guides\GuideRepository as Guide;
use App\Http\Requests\GuideRequest;
use Str;
use App\Helper\Helper;

class GuideController extends Controller
{
    public function __construct(Guide $guides) 
    {
        $this->routeIndex = route('guide-list');
        $this->guides = $guides;
    }

    public function index()
    {
        $data = $this->guides->get();
        return view('pages.guides.index', compact('data'));
    }

    public function form($uuid = null)
    {
        $item = null;
        if ($uuid) {
            $item = $this->guides->getByUuid($uuid);
            if (!$item) {
                return redirect($this->routeIndex)->with(['error'=> 'Data tidak dapat ditemukan']);
            }
        }

        $banks = Helper::getBanks();
        return view('pages.guides.form', compact('item', 'banks'));
    }

    public function create(GuideRequest $request)
    {
        $name = $request->input('name');
        $idCardNumber = $request->input('id_card_number');
        $phone = $request->input('phone');
        $haveBankAccount = (int) $request->input('have_bank_account');
        $bankName = $request->input('bank_name');
        $bankAccountNumber = $request->input('bank_account_number');
        $bankAccountName = $request->input('bank_account_name');
        $description = $request->input('description');
        $is_active = (int) $request->input('is_active');

        $input = [
            'uuid' => Str::uuid(),
            'name' => Str::title($name),
            'id_card_number' => $idCardNumber,
            'member_number' => 0,
            'phone' => $phone,
            'have_bank_account' => $haveBankAccount,
            'bank_name' => $bankName,
            'bank_account_number' => $bankAccountNumber,
            'bank_account_name' => $bankAccountName,
            'description' => $description,
            'is_active' => $is_active,
        ];
        $item = $this->guides->create($input);
        if ($item) {
            $input = ['member_number' => Helper::getMemberNumber($item->id)];
            $this->guides->update($item, $input);
        }

        return redirect($this->routeIndex)->with(['success'=> 'Data berhasil ditambahkan.']);
    }

    public function update(GuideRequest $request, $uuid)
    {
        $name = $request->input('name');
        $idCardNumber = $request->input('id_card_number');
        $phone = $request->input('phone');
        $haveBankAccount = (int) $request->input('have_bank_account');
        $bankName = $request->input('bank_name');
        $bankAccountNumber = $request->input('bank_account_number');
        $bankAccountName = $request->input('bank_account_name');
        $description = $request->input('description');
        $is_active = (int) $request->input('is_active');

        $item = $this->guides->getByUuid($uuid);
        if (!$item) {
            return redirect($this->routeIndex)->with(['error'=> 'Data tidak dapat ditemukan']);
        }

        $input = [
            'name' => Str::title($name),
            'id_card_number' => $idCardNumber,
            'phone' => $phone,
            'have_bank_account' => $haveBankAccount,
            'bank_name' => $bankName,
            'bank_account_number' => $bankAccountNumber,
            'bank_account_name' => $bankAccountName,
            'description' => $description,
            'is_active' => $is_active,
        ];

        $this->guides->update($item, $input);
        return redirect($this->routeIndex)->with(['success'=> 'Data berhasil diubah.']);
    }

    public function delete($uuid)
    {
        $item = $this->guides->getByUuid($uuid);
        if (!$item) {
            return redirect($this->routeIndex)->with(['error'=> 'Data tidak dapat ditemukan']);
        }
        $this->guides->delete($item);
        return redirect($this->routeIndex)->with(['success'=> 'Data berhasil dihapus.']);
    }
}
