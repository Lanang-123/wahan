<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tickets\TicketRepository as Ticket;
use App\Models\Vouchers\VoucherRepository as Voucher;

class TicketVoucherController extends Controller
{
    public function __construct(Ticket $tickets, Voucher $vouchers)
    {
        $this->routeIndex = route('print-ticket');
        $this->tickets = $tickets;
        $this->vouchers = $vouchers;
    }

    public function index()
    {
        $data = [];
        $realizedData = [];
        $ticketData = $this->tickets->getByStatus('created');
        $voucherData = $this->vouchers->getByStatus('created');
        return view('pages.prints.index', compact('ticketData', 'voucherData', 'data'));
    }
}
