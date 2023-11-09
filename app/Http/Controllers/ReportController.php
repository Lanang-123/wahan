<?php

namespace App\Http\Controllers;

use App\Models\FeeTransfers\FeeTransferRepository;
use Illuminate\Http\Request;
use App\Models\Tickets\TicketRepository as Ticket;
use App\Models\Vouchers\VoucherRepository as Voucher;
use App\Models\Rides\RideRepository as Ride;
use App\Models\CarTypes\CarTypeRepository as CarType;
use App\Models\CheckinRides\CheckinRideRepository as CheckinRide;
use App\Models\CheckinParkings\CheckinParkingRepository as CheckinParking;
use App\Models\CheckinObjects\CheckinObjectRepository as CheckinObject;
use App\Models\Guides\GuideRepository as Guide;
use App\Models\FeeTransfers\FeeTransferRepository as FeeTransfer;
use App\Models\Orders\OrderRepository as Order;
use App\Models\OrderItems\OrderItemRepository as OrderItem;
use Carbon\Carbon;
use Str;
use Excel;
use QrCode;

class ReportController extends Controller
{
    public function __construct(OrderItem $orderItems, CheckinObject $checkinObjects, Order $orders, Guide $guides, FeeTransfer $feeTransfers, Ticket $tickets, Voucher $vouchers, Ride $rides, CheckinRide $checkinRides, CarType $carTypes, CheckinParking $checkinParkings)
    {
        $this->headColor = '#003473';
        $this->tickets = $tickets;
        $this->vouchers = $vouchers;
        $this->rides = $rides;
        $this->checkinRides = $checkinRides;
        $this->carTypes = $carTypes;
        $this->checkinParkings = $checkinParkings;
        $this->guides = $guides;
        $this->feeTransfers = $feeTransfers;
        $this->orders = $orders;
        $this->checkinObjects = $checkinObjects;
        $this->orderItems = $orderItems;
    }

    public function ticket(Request $request)
    {
        // $startDate = $request->input('startDate');
        // $endDate = $request->input('endDate');
        $status = $request->input('status');
        $download = $request->input('download');

        // if (empty($endDate)) {
        //     $endDate = Carbon::now()->format('d M Y');
        // }
        // if (empty($startDate)) {
        //     $startDate = Carbon::parse($endDate)->subMonth(1)->format('d M Y');
        // }
        $ticketStatuses = config('constant.TICKET_STATUSES');

        $data = $this->tickets->getReport($status, $download);
        if ($download) {
            return $this->downloadTicket($status, $data);
        }

        return view('pages.reports.ticket', compact('data', 'ticketStatuses', 'status'));
    }

    public function downloadTicket($status, $data)
    {
        if ($status == '') {
            $status = 'Semua status';
        }
        foreach ($data as $item) {
            $exportData[] = ([
                'KODE' => $item->code,
                'JENIS TIKET' => $item->ticket_type_name,
                'HARGA' => $item->price,
                'STATUS' => $item->status_display,
            ]);
        }

        return Excel::create('Laporan-tiket-' . $status, function ($excel) use ($status, $exportData) {

            $excel->sheet('Sheetname', function ($sheet) use ($status, $exportData) {

                $sheet->cell('A4:D4', function ($cells) {
                    $cells->setBackground($this->headColor);
                    $cells->setFontColor('#ffffff');
                    $cells->setFontWeight('bold');
                });
                $sheet->row(1, array('Laporan Tiket'));
                $sheet->row(2, array('Status: ' . Str::title($status)));
                $sheet->setFreeze('A5');

                $sheet->fromArray($exportData, null, 'A4', true, true);
            });

        })->download('xls');
    }
    public function voucher(Request $request)
    {
        $status = $request->input('status');
        $download = $request->input('download');

        $ticketStatuses = config('constant.VOUCHER_STATUSES');

        $data = $this->vouchers->getReport($status, $download);
        if ($download) {
            return $this->downloadVoucher($status, $data);
        }

        return view('pages.reports.voucher', compact('data', 'ticketStatuses', 'status'));
    }

    public function downloadVoucher($status, $data)
    {
        if ($status == '') {
            $status = 'Semua status';
        }
        foreach ($data as $item) {
            $exportData[] = ([
                'KODE' => $item->code,
                'HARGA' => $item->nominal_display,
                'STATUS' => $item->status_display,
            ]);
        }

        return Excel::create('Laporan-voucher-' . $status, function ($excel) use ($status, $exportData) {

            $excel->sheet('Sheetname', function ($sheet) use ($status, $exportData) {

                $sheet->cell('A4:C4', function ($cells) {
                    $cells->setBackground($this->headColor);
                    $cells->setFontColor('#ffffff');
                    $cells->setFontWeight('bold');
                });
                $sheet->row(1, array('Laporan voucher'));
                $sheet->row(2, array('Status: ' . Str::title($status)));
                $sheet->setFreeze('A5');

                $sheet->fromArray($exportData, null, 'A4', true, true);
            });

        })->download('xls');
    }

    public function object(Request $request)
    {
        $startDate = $request->input('startDate');
        $endDate = $request->input('endDate');
        $download = $request->input('download');

        if (empty($endDate)) {
            $endDate = Carbon::now()->format('d M Y');
        }
        if (empty($startDate)) {
            // $startDate = Carbon::parse($endDate)->subMonth(1)->format('d M Y');
            $startDate = Carbon::now()->format('d M Y');
        }


        $data = $this->checkinObjects->getReport($startDate, $endDate, $download);
        if ($download) {
            return $this->downloadObject($startDate, $endDate, $data);
        }

        return view('pages.reports.object', compact('data', 'startDate', 'endDate'));
    }

    public function downloadObject($startDate, $endDate, $data)
    {

        foreach ($data as $item) {
            $exportData[] = ([
                'TANGGAL' => $item->created_at_display,
                'NOMOR TIKET' => $item->ticket_number,
                'JAM MASUK' => $item->checkin_time,
                'JAM KELUAR' => $item->checkout_time,
            ]);
        }

        return Excel::create('Laporan-kunjungan-objek-' . $startDate . '-' . $endDate, function ($excel) use ($startDate, $endDate, $exportData) {

            $excel->sheet('Sheetname', function ($sheet) use ($startDate, $endDate, $exportData) {

                $sheet->cell('A4:D4', function ($cells) {
                    $cells->setBackground($this->headColor);
                    $cells->setFontColor('#ffffff');
                    $cells->setFontWeight('bold');
                });
                $sheet->row(1, array('Laporan Kunjungan Objek'));
                $sheet->row(2, array('Tanggal: ' . $startDate . ' - ' . $endDate));
                $sheet->setFreeze('A5');

                $sheet->fromArray($exportData, null, 'A4', true, true);
            });

        })->download('xls');
    }

    public function ride(Request $request)
    {
        $startDate = $request->input('startDate');
        $endDate = $request->input('endDate');
        $ride_id = $request->input('ride_id');
        $download = $request->input('download');

        if (empty($endDate)) {
            $endDate = Carbon::now()->format('d M Y');
        }
        if (empty($startDate)) {
            // $startDate = Carbon::parse($endDate)->subMonth(1)->format('d M Y');
            $startDate = Carbon::now()->format('d M Y');
        }
        $rides = $this->rides->getActive();
        $wahana_name = 'Semua wahana';
        if ($ride_id) {
            $ride = $this->rides->find($ride_id);
            if ($ride) {
                $wahana_name = $ride->name;
            }
        }

        $data = $this->checkinRides->getReport($startDate, $endDate, $ride_id, $download);
        if ($download) {
            return $this->downloadride($startDate, $endDate, $wahana_name, $data);
        }

        return view('pages.reports.ride', compact('data', 'rides', 'startDate', 'endDate', 'ride_id'));
    }

    public function downloadride($startDate, $endDate, $wahana_name, $data)
    {

        foreach ($data as $item) {
            $exportData[] = ([
                'TANGGAL' => $item->created_at_display,
                'NAMA WAHANA' => $item->ride->name,
                'PEMILIK' => $item->ride->owner_name,
                'HARGA' => $item->ride->price_display,
                'KOMISI' => $item->ride->fee_display,
            ]);
        }

        return Excel::create('Laporan-kunjungan-wahana-' . $startDate . '-' . $endDate, function ($excel) use ($startDate, $endDate, $wahana_name, $exportData) {

            $excel->sheet('Sheetname', function ($sheet) use ($startDate, $endDate, $wahana_name, $exportData) {

                $sheet->cell('A4:D4', function ($cells) {
                    $cells->setBackground($this->headColor);
                    $cells->setFontColor('#ffffff');
                    $cells->setFontWeight('bold');
                });
                $sheet->row(1, array('Laporan Kunjungan Wahana'));
                $sheet->row(2, array('Tanggal: ' . $startDate . ' - ' . $endDate));
                $sheet->row(3, array('Wahana: ' . $wahana_name));
                $sheet->setFreeze('A5');

                $sheet->fromArray($exportData, null, 'A4', true, true);
            });

        })->download('xls');
    }

    public function parking(Request $request)
    {
        $startDate = $request->input('startDate');
        $endDate = $request->input('endDate');
        $car_type_id = $request->input('car_type_id');
        $download = $request->input('download');

        if (empty($endDate)) {
            $endDate = Carbon::now()->format('d M Y');
        }
        if (empty($startDate)) {
            // $startDate = Carbon::parse($endDate)->subMonth(1)->format('d M Y');
            $startDate = Carbon::now()->format('d M Y');
        }
        $car_types = $this->carTypes->getActive();

        $car_type_name = 'Semua jenis kendaraan';
        if ($car_type_id) {
            $car_type = $this->carTypes->find($car_type_id);
            if ($car_type) {
                $car_type_name = $car_type->name;
            }
        }

        $data = $this->checkinParkings->getReport($startDate, $endDate, $car_type_id, $download);
        if ($download) {
            return $this->downloadParking($startDate, $endDate, $car_type_name, $data);
        }

        return view('pages.reports.parking', compact('data', 'car_types', 'startDate', 'endDate', 'car_type_id'));
    }

    public function downloadParking($startDate, $endDate, $car_type_name, $data)
    {

        foreach ($data as $item) {
            $exportData[] = ([
                'TANGGAL' => $item->created_at_display,
                'NOMOR' => $item->checkin_number,
                'JENIS KENDARAAN' => $item->carType->name,
                'NOMOR POLISI' => $item->police_number,
                'JUMLAH PENUMPANG' => strval($item->total_passengers),
                'NEGARA' => $item->country,
                'DRIVER/GUIDE' => ($item->is_fee) ? 'Ya' : 'Tidak',
                'WAKTU PARKIR' => $item->time_parking,
                'WAKTU TRANSAKSI' => $item->transaction_time,
                'DURASI' => $item->duration_display,
                'HARGA' => $item->carType->price_display,
            ]);
        }

        return Excel::create('Laporan-parkir-' . $startDate . '-' . $endDate, function ($excel) use ($startDate, $endDate, $car_type_name, $exportData) {

            $excel->sheet('Sheetname', function ($sheet) use ($startDate, $endDate, $car_type_name, $exportData) {

                $sheet->cell('A4:K4', function ($cells) {
                    $cells->setBackground($this->headColor);
                    $cells->setFontColor('#ffffff');
                    $cells->setFontWeight('bold');
                });
                $sheet->row(1, array('Laporan Parkir'));
                $sheet->row(2, array('Tanggal: ' . $startDate . ' - ' . $endDate));
                $sheet->row(3, array('Jenis Kendaraan: ' . $car_type_name));
                $sheet->setFreeze('A5');

                $sheet->fromArray($exportData, null, 'A4', true, true);
            });

        })->download('xls');
    }

    public function feeTransfer(Request $request)
    {
        $startDate = $request->input('startDate');
        $endDate = $request->input('endDate');
        $guide_id = $request->input('guide_id');
        $download = $request->input('download');

        if (empty($endDate)) {
            $endDate = Carbon::now()->format('d M Y');
        }
        if (empty($startDate)) {
            $startDate = Carbon::now()->format('d M Y');
        }
        $guides = $this->guides->getActive();

        $guide_name = 'Semua Guide';
        if ($guide_id) {
            $guide = $this->guides->find($guide_id);
            if ($guide) {
                $guide_name = $guide->name;
            }
        }

        $feelTransferRepository = new FeeTransferRepository();

        $data = $feelTransferRepository
            ->getReport($startDate, $endDate, $guide_id, $download);
        if ($download) {
            return $this->downloadFeeTransfer($startDate, $endDate, $guide_name, $data);
        }

        return view('pages.reports.fee-transfer', compact('data', 'guides', 'startDate', 'endDate', 'guide_id'));
    }

    public function downloadFeeTransfer($startDate, $endDate, $guide_name, $data)
    {

        foreach ($data as $item) {
            $exportData[] = ([
                'TANGGAL' => $item->created_at_display,
                'NAMA GUIDE' => $item->guide->name,
                'JENIS PEMBAYARAN' => $item->payment_type,
                'NAMA BANK' => $item->bank_name,
                'NOMOR AKUN BANK' => $item->bank_account_number,
                'NAMA AKUN BANK' => $item->bank_account_name,
                'TOTAL' => strval($item->total),
            ]);
        }

        return Excel::create('Laporan-transfer-fee-' . $startDate . '-' . $endDate, function ($excel) use ($startDate, $endDate, $guide_name, $exportData) {

            $excel->sheet('Sheetname', function ($sheet) use ($startDate, $endDate, $guide_name, $exportData) {

                $sheet->cell('A4:G4', function ($cells) {
                    $cells->setBackground($this->headColor);
                    $cells->setFontColor('#ffffff');
                    $cells->setFontWeight('bold');
                });
                $sheet->row(1, array('Laporan Transfer Fee'));
                $sheet->row(2, array('Tanggal: ' . $startDate . ' - ' . $endDate));
                $sheet->row(3, array('Guide: ' . $guide_name));
                $sheet->setFreeze('A5');

                $sheet->fromArray($exportData, null, 'A4', true, true);
            });

        })->download('xls');
    }

    public function sales(Request $request)
    {
        $startDate = $request->input('startDate');
        $endDate = $request->input('endDate');
        $download = $request->input('download');

        if (empty($endDate)) {
            $endDate = Carbon::now()->format('d M Y');
        }
        if (empty($startDate)) {
            $startDate = Carbon::now()->format('d M Y');
        }

        $data = $this->orders->getReport($startDate, $endDate, $download);
        if ($download) {
            return $this->downloadSales($startDate, $endDate, $data);
        }

        return view('pages.reports.sales', compact('data', 'startDate', 'endDate'));
    }

    public function downloadSales($startDate, $endDate, $data)
    {

        foreach ($data as $item) {
            $exportData[] = ([
                'TANGGAL' => $item->created_at_display,
                'NOMOR ORDER' => $item->order_number,
                'TOTAL TIKET' => strval($item->total_ticket),
                'TOTAL VOUCHER' => strval($item->total_voucher),
                'TOTAL ITEM' => strval($item->total_item),
                'TOTAL HARGA TIKET' => strval($item->total_price_ticket),
                'TOTAL HARGA VOUCHER' => strval($item->total_price_voucher),
                'TOTAL HARGA' => strval($item->total_price),
                'PARKIR' => ($item->parking) ? 'Ya' : 'Tidak',
                'TOTAL PENUMPANG' => ($item->parking) ? strval($item->parking->total_passengers) : '-',
                'GUIDE PARKIR' => ($item->use_guide_parking) ? 'Ya' : 'Tidak',
                'GUIDE KASIR' => ($item->use_guide) ? 'Ya' : 'Tidak',
                'STATUS FEE' => $item->status_fee_display,
            ]);
        }
        return Excel::create('Laporan-penjualan-tiket-voucher-' . $startDate . '-' . $endDate, function ($excel) use ($startDate, $endDate, $exportData) {
            $excel->sheet('Sheetname', function ($sheet) use ($startDate, $endDate, $exportData) {

                $sheet->cell('A4:M4', function ($cells) {
                    $cells->setBackground($this->headColor);
                    $cells->setFontColor('#ffffff');
                    $cells->setFontWeight('bold');
                });
                $sheet->row(1, array('Laporan Penjualan Tiket/Voucher'));
                $sheet->row(2, array('Tanggal: ' . $startDate . ' - ' . $endDate));
                $sheet->setFreeze('A5');

                // dd($exportData);
                $sheet->fromArray($exportData, null, 'A4', true, true);
            });

        })->download('xls');
    }

    public function cancelOrder(Request $request)
    {
        $orderId = $request->input('orderId');

        $orders = $this->orders->onlyTrashed();
        $data = $this->orders->onlyTrashed($orderId, 50);

        return view('pages.reports.cancel-order', compact('orderId', 'orders', 'data'));
    }

    public function checkout(Request $request)
    {
        $startDate = $request->input('startDate');
        $endDate = $request->input('endDate');
        $type = $request->input('type');
        $download = $request->input('download');

        if (empty($endDate)) {
            $endDate = Carbon::now()->format('d M Y');
        }
        if (empty($startDate)) {
            $startDate = Carbon::now()->format('d M Y');
        }

        $types = config('constant.PRODUCT_TYPES');

        $data = $this->orderItems->getReport($startDate, $endDate, $type, $download);
        if ($download) {
            return $this->downloadCheckout($startDate, $endDate, $type, $data);
        }

        return view('pages.reports.checkout', compact('data', 'types', 'type', 'startDate', 'endDate'));
    }

    public function downloadCheckout($startDate, $endDate, $type, $data)
    {

        foreach ($data as $item) {
            $exportData[] = ([
                'TANGGAL' => $item->created_at_display,
                'JENIS PRODUK' => $item->product_type,
                'KODE' => $item->code,
                'HARGA' => strval($item->price)
            ]);
        }

        return Excel::create('Laporan-tiket-voucher-keluar' . $startDate . '-' . $endDate, function ($excel) use ($startDate, $endDate, $type, $exportData) {

            $excel->sheet('Sheetname', function ($sheet) use ($startDate, $endDate, $type, $exportData) {

                $sheet->cell('A4:D4', function ($cells) {
                    $cells->setBackground($this->headColor);
                    $cells->setFontColor('#ffffff');
                    $cells->setFontWeight('bold');
                });
                $sheet->row(1, array('Laporan Penjualan Tiket/Voucher'));
                $sheet->row(2, array('Tanggal: ' . $startDate . ' - ' . $endDate));
                $sheet->row(3, array('Jenis Produk: ' . $type));
                $sheet->setFreeze('A5');

                $sheet->fromArray($exportData, null, 'A4', true, true);
            });

        })->download('xls');
    }


    //generate province
    // public function compareCsv()
    // {
    //     $city_aryo = $this->readData('city.csv', ';');
    //     $city_github = $this->readData('indonesia_cities.csv', ';');
    //     $data = [];
    //     foreach ($city_aryo as $key => $ctA) {
    //         foreach ($city_github as $key => $ctG) {
    //             if (str_replace(' ', '', Str::upper($ctG[3])) == str_replace(' ', '', Str::upper($ctA[3].$ctA[2]))){
    //                 $item = [
    //                     'map_id' => $ctG[1],
    //                     'city_id' => $ctA[0],
    //                     'province_id' => $ctA[1],
    //                     'city_name' => $ctA[2],
    //                     'type' => $ctA[3],
    //                     'postal_code' => $ctA[4],
    //                     'updated_at' => $ctA[5]
    //                 ];
    //                 array_push($data, $item);
    //                 break;
    //             }
    //         }
    //     }
    //     $this->downloadNewReg($data);
    // }

    // public function downloadNewReg($data)
    // {
    //     return Excel::create('new-regencies', function($excel) use($data) {

    //         $excel->sheet('Sheetname', function($sheet) use($data) {

    //             $sheet->cell('A1:G1', function($cells) {
    //                 $cells->setBackground($this->headColor);
    //                 $cells->setFontColor('#ffffff');
    //                 $cells->setFontWeight('bold');
    //             });

    //             $sheet->fromArray($data, null, 'A1', true, true);
    //         });

    //     })->download('csv');
    // }

    // public function readCsv()
    // {

    //     $csvFileNames = ['province.csv', 'new-regencies.csv', 'indonesia_districts.csv', 'indonesia_villages.csv'];
    //     $data = [];
    //     foreach ($csvFileNames as $key => $file) {
    //         $del = ';';
    //         if ($key == 1) {
    //             $del = ',';
    //         }
    //         $item = $this->readData($file, $del);
    //         array_push($data, $item);
    //     }
    //     $this->generateCsv($data);
    // }

    // public function readData($fileName, $delimiter)
    // {
    //     $csvFile = public_path('csv/' . $fileName);
    //     return $this->read($csvFile,array('delimiter' => $delimiter));
    // }

    // public function read($csvFile, $array)
    // {
    //     $file_handle = fopen($csvFile, 'r');
    //     while (!feof($file_handle)) {
    //         $line_of_text[] = fgetcsv($file_handle, 0, $array['delimiter']);
    //     }
    //     fclose($file_handle);
    //     return $line_of_text;
    // }

    // public function generateCsv($data)
    // {
    //     $provinsi = $data[0];
    //     $kabupaten = $data[1];
    //     $kecamatan = $data[2];
    //     $kelurahan = $data[3];
    //     $newData = [];

    //     $id_kecamatan = 3629;
    //     $id_kelurahan = 41985;
    //     foreach ($provinsi as $key => $prov) {
    //         if ($key >= 20) {
    //             foreach ($kabupaten as $keyKab => $kab) {
    //                 if ($prov[0] == $kab[2]){
    //                     foreach ($kecamatan as $kec) {
    //                         if ($kab[0] == $kec[2]){
    //                             $id_kecamatan++;
    //                             foreach ($kelurahan as $kel) {
    //                                 if ($kec[1] == $kel[2]){
    //                                     $id_kelurahan++;
    //                                     // $text = $prov[1].'-'.$kab[2].'-'.$kec[2].'-'.$kel[2];
    //                                     $item = [
    //                                         'province_id' => $prov[0],
    //                                         'province' => $prov[1],
    //                                         'city_id' => $kab[1],
    //                                         'city_name' => $kab[3],
    //                                         'type' => $kab[4],
    //                                         'postal_code' => $kab[5],
    //                                         'id_kecamatan' => $id_kecamatan,
    //                                         'kecamatan' => Str::title($kec[3]),
    //                                         'id_kelurahan' => $id_kelurahan,
    //                                         'kelurahan' => Str::title($kel[3]),
    //                                     ];
    //                                     array_push($newData, $item);
    //                                     // break;
    //                                 }
    //                             }
    //                         }
    //                     } 
    //                 }
    //             }
    //         }
    //     }
    //     $this->downloadExc($newData);

    // }

    // public function downloadExc($data)
    // {
    //     return Excel::create('provinsi-'.$data[0]['province'], function($excel) use($data) {

    //         $excel->sheet('Sheetname', function($sheet) use($data) {

    //             $sheet->cell('A1:H1', function($cells) {
    //                 $cells->setBackground($this->headColor);
    //                 $cells->setFontColor('#ffffff');
    //                 $cells->setFontWeight('bold');
    //             });

    //             $sheet->fromArray($data, null, 'A1', true, true);
    //         });

    //     })->download('xls');
    // }
}
