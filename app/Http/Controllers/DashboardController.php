<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helper\Helper;
use App\Models\CheckinParkings\CheckinParkingRepository as CheckinParking;
use App\Models\OrderItems\OrderItemRepository as OrderItem;
use App\Models\Orders\OrderRepository as Order;
use App\Models\CheckinRides\CheckinRideRepository as CheckinRide;
use App\Models\CheckinObjects\CheckinObjectRepository as CheckinObject;
use App\Models\FeeTransfers\FeeTransferRepository as FeeTransfer;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function __construct(Order $orders, CheckinParking $checkinParkings, OrderItem $orderItems, CheckinRide $checkinRide, CheckinObject $checkinObject, FeeTransfer $feeTransfers)
    {
        $this->feeTransfers = $feeTransfers;
        $this->checkinParkings = $checkinParkings;
        $this->orderItems = $orderItems;
        $this->checkinRide = $checkinRide;
        $this->checkinObject = $checkinObject;
        $this->orders = $orders;
    }

    public function index(Request $request)
    {
        // $currentDate = Carbon::now()->format('Y-m-d');
        // $totalParking = $this->checkinParkings->getTotal($currentDate);
        // $totalPassenger = $this->checkinParkings->getTotalPassenger($currentDate);
        // $totalCheckinObject = $this->checkinObject->getTotal($currentDate);
        // $totalCheckinRide = $this->checkinRide->getTotal($currentDate);
        // $totalTicketSales = $this->orderItems->getTotalSales($currentDate, 'ticket');
        // $totalVoucherSales = $this->orderItems->getTotalSales($currentDate, 'voucher');
        // $totalFeeTransfer = $this->feeTransfers->getTotal($currentDate);

        // $totalTicketSales = Helper::getAmountDisplay($totalTicketSales);
        // $totalVoucherSales = Helper::getAmountDisplay($totalVoucherSales);
        // $totalFeeTransfer = Helper::getAmountDisplay($totalFeeTransfer);

        $currentDateDisplay = Helper::formatDateIndo(Carbon::now()->toDateString());

        
        $startDate = $request->input('startDate');
        $endDate = $request->input('endDate');
        $download = $request->input('download');

        $data = $this->getDataDashboard($startDate, $endDate);
        // dd($data);

        if (empty($endDate)) {
            $endDate = Carbon::now()->format('d M Y');
        }
        if (empty($startDate)) {
            $startDate = Carbon::now()->format('d M Y');
        }
        
        return view('pages.dashboard', compact('currentDateDisplay', 'startDate', 'endDate', 'data'));
    }

    public function getDataDashboard($startDate, $endDate) {
        $startDate = Carbon::parse($startDate)->format('Y-m-d');
        $endDate = Carbon::parse($endDate)->format('Y-m-d');

        $parkings = $this->checkinParkings->getTotal($startDate, $endDate);
        $totalPassenger = $this->checkinParkings->getTotalPassenger($startDate, $endDate);
        $checkinObject = $this->checkinObject->getTotal($startDate, $endDate);
        $checkinRides = $this->checkinRide->getTotal($startDate, $endDate);
        $sales = $this->orders->getSummarySales($startDate, $endDate);
        $totalFeeTransfer = $this->feeTransfers->getTotal($startDate, $endDate);

        return [
            'parkings' => $parkings,
            'totalPassenger' => $totalPassenger,
            'checkinObject' => $checkinObject,
            'checkinRides' => $checkinRides,
            'sales' => $sales,
            'totalFeeTransfer' => $totalFeeTransfer
        ];


    }

    public function live()
    {
        $currentDate = Carbon::now()->format('Y-m-d');
        $totalParking = $this->checkinParkings->getTotal($currentDate);
        $totalPassenger = $this->checkinParkings->getTotalPassenger($currentDate);
        $totalCheckinObject = $this->checkinObject->getTotal($currentDate);
        $totalCheckinRide = $this->checkinRide->getTotal($currentDate);
        $totalTicketSales = $this->orderItems->getTotalSales($currentDate, 'ticket');
        $totalVoucherSales = $this->orderItems->getTotalSales($currentDate, 'voucher');
        $totalFeeTransfer = $this->feeTransfers->getTotal($currentDate);
        $totalProfit = ($totalTicketSales + $totalVoucherSales) - $totalFeeTransfer;

        $totalTicketSales = Helper::getAmountDisplay($totalTicketSales);
        $totalVoucherSales = Helper::getAmountDisplay($totalVoucherSales);
        $totalFeeTransfer = Helper::getAmountDisplay($totalFeeTransfer);
        $totalProfit = Helper::getAmountDisplay($totalProfit);

        $currentDateDisplay = Helper::formatDateIndo(Carbon::now()->toDateString());

        return response()->json([
            'totalParking' => $totalParking,
            'totalPassenger' => $totalPassenger,
            'totalCheckinObject' => $totalCheckinObject,
            'totalCheckinRide' => $totalCheckinRide,
            'totalVoucherSales' => $totalVoucherSales,
            'totalTicketSales' => $totalTicketSales,
            'totalFeeTransfer' => $totalFeeTransfer,
            'currentDateDisplay' => $currentDateDisplay,
            'totalProfit' => $totalProfit
        ]);
        
    }

    
}
