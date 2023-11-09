<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Configs\ConfigRepository as Config;
use App\Http\Requests\ProfileRequest;
use App\Http\Requests\TicketExpirationRequest;

class SettingController extends Controller
{
    public function __construct(Config $configs)
    {
        $this->configs = $configs;
    }

    public function profil()
    {
        $head_of_division = json_decode($this->configs->getValByName('json_val', 'head_of_division'));

        $head = $this->configs->getValByName('str_val', 'head');
        $cashier = $this->configs->getValByName('str_val', 'cashier');

        return view('pages.settings.profil', compact('head_of_division', 'head', 'cashier'));
    }

    public function updateProfil(ProfileRequest $request)
    {
        $name = $request->input('name');
        $age = $request->input('age');
        $position = $request->input('position');
        $address = $request->input('address');
        $head = $request->input('head');
        $cashier = $request->input('cashier');

        
        $fields = [
            [
                'key' => 'head_of_division',
                'type' => 'json_val',
                'value' => json_encode([
                    'name' => $name,
                    'age' => $age,
                    'position' => $position,
                    'address' => $address,
                ])
            ], [
                'key' => 'head',
                'type' => 'str_val',
                'value' => $head
            ], [
                'key' => 'cashier',
                'type' => 'str_val',
                'value' => $cashier
            ]
        ];

        foreach ($fields as $item) {
            $config = $this->configs->getByName($item['key']);
            $this->configs->update($config, [$item['type'] => $item['value']]);
        }

        return redirect(route('profil'))->with(['success'=> 'Update profil berhasil']);

    }

    public function ticketExpiration()
    {
        $ticket_expiration = $this->configs->getValByName('int_val', 'ticket_expiration');

        return view('pages.settings.ticket-expiration', compact('ticket_expiration'));
    }

    public function updateTicketExpiration(TicketExpirationRequest $request)
    {
        $ticket_expiration = $request->input('ticket_expiration');

        $config = $this->configs->getByName('ticket_expiration');
        if (!$config) {
            return redirect(route('ticket-expiration'))->with(['error'=> 'Data tidak dapat ditemukan']);
        }
        $this->configs->update($config, ['int_val' => $ticket_expiration]);
    
        return redirect(route('ticket-expiration'))->with(['success'=> 'Update kadaluarsa tiket berhasil']);

    }
}
