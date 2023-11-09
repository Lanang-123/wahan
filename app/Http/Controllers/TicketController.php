<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tickets\TicketRepository as Ticket;
use App\Models\TicketTypes\TicketTypeRepository as TicketTypes;
use App\Http\Requests\TicketRequest;
use Str;
use Helper;

class TicketController extends Controller
{
    public function __construct(Ticket $tickets, TicketTypes $ticketTypes) 
    {
        $this->routeIndex = route('ticket-list');
        $this->tickets = $tickets;
        $this->ticketTypes = $ticketTypes;
    }
    
    public function index(Request $request)
    {
        $limit = 20;
        $status = $request->input('status');
        $code = $request->input('code', '');

        $ticketStatuses = config('constant.TICKET_STATUSES');
        $data = $this->tickets->getWithPaginate($status, $limit, $code);
        return view('pages.tickets.index', compact('data', 'status', 'ticketStatuses', 'code'));
    }
    
    public function form($code = null)
    {
        $item = null;
        if ($code) {
            $item = $this->tickets->getByCode($code);
            if (!$item) {
                return redirect($this->routeIndex)->with(['error'=> 'Data tidak dapat ditemukan']);
            }
        }
        $ticketTypes = $this->ticketTypes->get();
        return view('pages.tickets.form', compact('item', 'ticketTypes'));
    }

    public function create(TicketRequest $request)
    {
        $ticketTypeId = $request->input('ticket_type_id');
        $total = $request->input('total');
        $data = Helper::generateRandomString();
        $ticketStatus = config('constant.TICKET_STATUSES');

        if ($total AND $total > 0) {
            for ($i=0; $i < $total; $i++) { 
                $input = [
                    'code' => Helper::generateRandomString(),
                    'ticket_type_id' => $ticketTypeId,
                    'status' => $ticketStatus[0],
                ];
                $this->tickets->create($input);
            }
        }

        return redirect($this->routeIndex)->with(['success'=> 'Data berhasil ditambahkan.']);
    }

    public function update(TicketRequest $request, $code)
    {
        $name = $request->input('name');
        $price = $request->input('price');
        $is_active = (int) $request->input('is_active');

        $item = $this->tickets->getByCode($code);
        if (!$item) {
            return redirect($this->routeIndex)->with(['error'=> 'Data tidak dapat ditemukan']);
        }

        $input = [
            'code' => Str::code($name, '-'),
            'name' => $name,
            'price' => $price,
            'is_active' => $is_active,
        ];
        $this->tickets->update($item, $input);
        return redirect($this->routeIndex)->with(['success'=> 'Data berhasil diubah.']);
    }

    public function delete($code)
    {
        $item = $this->tickets->getByCode($code);
        if (!$item) {
            return redirect($this->routeIndex)->with(['error'=> 'Data tidak dapat ditemukan']);
        }
        $this->tickets->delete($item);
        return redirect($this->routeIndex)->with(['success'=> 'Data berhasil dihapus.']);
    }

    public function deleteExpired()
    {
        $expired = $this->tickets->deleteExpired();
        $usedOld = $this->tickets->deleteUsedOld();
        return redirect()->back()->with(['success'=> 'Tiket kadaluarsa berhasil dihapus']);
    }
}
