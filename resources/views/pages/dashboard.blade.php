@extends('layouts.master')
@section('main-content')
<div class="breadcrumb">
    <div>
        <h1>Halo, {{ \Auth::user()->name}}</h1>
        <div class="text-muted mt-1">{{$currentDateDisplay}}</div>
    </div>
</div>

<div class="separator-breadcrumb border-top"></div>

<form action="{{ route('dashboard') }}" method="get">
    <div class="row mb-3">
        <div class="col-md-12">
            <h5><i class="i-Filter-2 mr-2"></i>Filter</h5>
        </div>
        <div class="row col-md-12">
            <div class="col-md-3 mb-3">
                <label>Dari tanggal</label>
                <div class="input-group">
                    <input name="startDate" value="{{ !empty(old('startDate')) ? old('startDate') : $startDate }}" class="picker2 form-control form-control" placeholder="yyyy-mm-dd" >
                    <div class="input-group-append">
                        <button class="btn btn-info"  type="button">
                            <i class="icon-regular i-Calendar-4"></i>
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <label>Sampai tanggal</label>
                <div class="input-group">
                    <input name="endDate" value="{{ !empty(old('endDate')) ? old('endDate') : $endDate }}" class="picker2 form-control form-control" placeholder="yyyy-mm-dd" >
                    <div class="input-group-append">
                        <button class="btn btn-info"  type="button">
                            <i class="icon-regular i-Calendar-4"></i>
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-md-2 mb-3 d-flex align-items-end">
                <button type="submit" class="btn btn-danger" >Filter</button>
            </div>
        </div>
    </div>
</form>

@php
    $totalIncome = 0;
@endphp

<div class="row">
    <!-- ICON BG -->
    <div class="col-md-12">
        <div class="card mb-4">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-2 mb-2">
                        <div class="text-center d-sm-block">
                            <p class="text-muted mt-2 mb-2 text-16"><strong>Parkir</strong></p>
                            <div class="card-icon-bg card-icon-bg-primary">
                                <i class="i-Car"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-10">
                        @if ($data['parkings'] AND count($data['parkings']) > 0)
                            <div class="table-responsive">
                                <table class="table mb-0 ">
                                    <thead>
                                        <tr>
                                            <th scope="col">Jenis Kendaraan</th>
                                            <th scope="col" class="text-center">Total Kendaraan</th>
                                            <th scope="col" class="text-center">Total Penumpang</th>
                                            <th scope="col" class="text-right">Total Uang</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $totalParkingAmount = 0;
                                        @endphp
                                        @foreach ($data['parkings'] as $item)
                                            @php
                                                $totalParkingAmount += $item['price'];
                                            @endphp
                                            <tr>
                                                <td>{{$item['name']}}</td>
                                                <td class="text-center">{{$item['total']}}</td>
                                                <td class="text-center">{{$item['total_passengers']}}</td>
                                                {{-- <td class="text-right">{{$item['price']}}</td> --}}
                                                <td class="text-right">{{\Helper::getAmountDisplay($item['price'])}}</td>
                                            </tr>
                                        @endforeach
                                        <tr>
                                            <th colspan="3">Total penjualan dari parkir</th>
                                            <td class="text-right"><span class="text-16 text-success"><strong>{{\Helper::getAmountDisplay($totalParkingAmount)}}</strong></span></td>
                                        </tr>
                                        @php
                                            $totalIncome += $totalParkingAmount;
                                        @endphp
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <div class="w-100 h-100 d-flex justify-content-center align-items-center">
                                <span class="text-mute">Belum ada kendaraan parkir</span>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-12">
        <div class="card mb-4">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-2 mb-2">
                        <div class="text-center">
                            <p class="text-muted mt-2 mb-2 text-16"><strong>Penjualan</strong></p>
                            <div class="card-icon-bg card-icon-bg-primary">
                                <i class="i-Bar-Chart"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-10 mb-2">
                        @if ($data['sales'] AND count($data['sales']) > 0)
                            <div class="table-responsive">
                                <table class="table mb-0">
                                    <thead>
                                        <tr>
                                            <th scope="col" class="text-center"></th>
                                            <th scope="col" class="text-center">Total Transaksi</th>
                                            <th scope="col" class="text-center">Total Item</th>
                                            {{-- <th scope="col" class="text-center">Total Guide</th>
                                            <th scope="col" class="text-center">Sudah Transfer Fee</th>
                                            <th scope="col" class="text-center">Belum Transfer Fee</th> --}}
                                            <th scope="col" class="text-right">Total Penjualan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $totalSales = 0;
                                            $totalTransaction = 0;
                                            $totalItem = 0;
                                        @endphp
                                        @foreach ($data['sales'] as $item)
                                            @php
                                                $totalSales += $item['total_price'];
                                                $totalTransaction += $item['total_transaction'];
                                                $totalItem += $item['total_item'];
                                            @endphp
                                            <tr>
                                                <td>{{($item['use_guide']) ? 'Dengan Guide': 'Tanpa Guide'}}</td>
                                                <td class="text-center">{{$item['total_transaction']}}</td>
                                                <td class="text-center">{{$item['total_item']}}</td>
                                                {{-- <td class="text-center">{{$item['total_use_guide']}}</td>
                                                <td class="text-center">{{$item['total_already_transfer_fee']}}</td>
                                                <td class="text-center">{{$item['total_not_transferred_yet']}}</td> --}}
                                                <td class="text-right">{{\Helper::getAmountDisplay($item['total_price'])}}</td>
                                            </tr>
                                            
                                        @endforeach
                                        <tr>
                                            <th>Total penjualan</th>
                                            <th class="text-center">{{ $totalTransaction }}</th>
                                            <th class="text-center">{{ $totalItem }}</th>
                                            <td class="text-right"><span class="text-16 text-success"><strong>{{\Helper::getAmountDisplay($totalSales)}}</strong></span></td>
                                        </tr>
                                    </tbody>
                                    @php
                                        $totalIncome += $totalSales;
                                    @endphp
                                </table>
                                
                            </div>
                        @else
                            <div class="w-100 h-100 d-flex justify-content-center align-items-center">
                                <span class="text-mute">Belum ada penjualan</span>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-12">
        <div class="card mb-4">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-2 mb-2">
                        <div class="text-center">
                            <p class="text-muted mt-2 mb-2 text-16"><strong>Objek</strong></p>
                            <div class="card-icon-bg card-icon-bg-primary">
                                <i class="i-Japanese-Gate"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-10 mb-2">
                        @if ($data['checkinObject'])
                            <div class="table-responsive">
                                <table class="table mb-0">
                                    <thead>
                                        <tr>
                                            <th scope="col" class="text-center">Total Pengunjung</th>
                                            <th scope="col" class="text-center">Dengan Guide</th>
                                            <th scope="col" class="text-right">Total Fee</th>
                                            <th scope="col" class="text-right">Total Penjualan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="text-center">{{$data['checkinObject']['total']}}</td>
                                            <td class="text-center">{{$data['checkinObject']['total_with_guide']}}</td>
                                            <td class="text-right">{{\Helper::getAmountDisplay($data['checkinObject']['amount_fee'])}}</td>
                                            <td class="text-right">{{\Helper::getAmountDisplay($data['checkinObject']['price'])}}</td>
                                        </tr>
                                        <tr>
                                            <th colspan="3">Total penjualan dari Objek</th>
                                            <td class="text-right"><span class="text-16 text-success"><strong>{{\Helper::getAmountDisplay($data['checkinObject']['price'])}}</strong></span></td>
                                        </tr>
                                        <tr>
                                            <th colspan="3">Total fee dari Objek</th>
                                            <td class="text-right"><span class="text-16 text-danger"><strong>{{\Helper::getAmountDisplay($data['checkinObject']['amount_fee'])}}</strong></span></td>
                                        </tr>
                                    </tbody>
                                    {{-- @php
                                        $totalIncome += $data['checkinObject']['price'];
                                    @endphp --}}
                                </table>
                                
                            </div>
                        @else
                            <div class="w-100 h-100 d-flex justify-content-center align-items-center">
                                <span class="text-mute">Belum ada pengunjung</span>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-12">
        <div class="card mb-4">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-2 mb-2">
                        <div class="text-center">
                            <p class="text-muted mt-2 mb-2 text-16"><strong>Wahana</strong></p>
                            <div class="card-icon-bg card-icon-bg-primary">
                                <i class="i-Laughing"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-10 mb-2">
                        @if ($data['checkinRides'] AND count($data['checkinRides']) > 0)
                            <div class="table-responsive">
                                <table class="table mb-0">
                                    <thead>
                                        <tr>
                                            <th scope="col">Nama Wahana</th>
                                            <th scope="col" class="text-center">Total Pengunjung</th>
                                            <th scope="col" class="text-center">Dengan Guide</th>
                                            <th scope="col" class="text-right">Total Fee</th>
                                            <th scope="col" class="text-right">Total Penjualan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $totalRideSales = 0;
                                            $totalRideFee = 0;
                                        @endphp
                                        @foreach ($data['checkinRides'] as $item)
                                        @php
                                            $totalRideSales += $item['price'];
                                            $totalRideFee += $item['amount_fee'];
                                        @endphp
                                            <tr>
                                                <td>{{$item['name']}}</td>
                                                <td class="text-center">{{$item['total']}}</td>
                                                <td class="text-center">{{$item['total_with_guide']}}</td>
                                                <td class="text-right">{{\Helper::getAmountDisplay($item['amount_fee'])}}</td>
                                                <td class="text-right">{{\Helper::getAmountDisplay($item['price'])}}</td>
                                                {{-- <td class="text-right">{{$item['price']}}</td> --}}
                                                {{-- <td class="text-right">{{\Helper::getAmountDisplay($receivedMoney)}}</td> --}}
                                            </tr>
                                        @endforeach
                                        <tr>
                                            <th colspan="4">Total penjualan dari wahana</th>
                                            <td class="text-right"><span class="text-16 text-success"><strong>{{\Helper::getAmountDisplay($totalRideSales)}}</strong></span></td>
                                        </tr>
                                        <tr>
                                            <th colspan="4">Total fee dari wahana</th>
                                            <td class="text-right"><span class="text-16 text-danger"><strong>{{\Helper::getAmountDisplay($totalRideFee)}}</strong></span></td>
                                        </tr>
                                    </tbody>
                                    @php
                                        $totalIncome += $totalRideSales;
                                    @endphp
                                </table>
                                
                            </div>
                        @else
                            <div class="w-100 h-100 d-flex justify-content-center align-items-center">
                                <span class="text-mute">Belum ada pengunjung wahana</span>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-lg-4 col-md-6 col-sm-6">
        <div class="card card-icon-bg card-icon-bg-primary o-hidden mb-4">
            <div class="card-body">
                <i class="i-Money-2"></i>
                <div class="ml-4">
                    <p class="text-muted mt-2 mb-0">Total Penjualan</p>
                    <p class="text-primary text-24 line-height-1 mb-2 js-totalFeeTransfer">{{\Helper::getAmountDisplay($totalIncome)}}</p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-6 col-sm-6">
        <div class="card card-icon-bg card-icon-bg-primary o-hidden mb-4">
            <div class="card-body">
                <i class="i-Money-Bag"></i>
                <div class="ml-4">
                    <p class="text-muted mt-2 mb-0">Total Sudah Transfer Fee</p>
                    <p class="text-danger text-24 line-height-1 mb-2 js-totalFeeTransfer">{{\Helper::getAmountDisplay($data['totalFeeTransfer'])}}</p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-6 col-sm-6">
        <div class="card card-icon-bg card-icon-bg-primary o-hidden mb-4">
            <div class="card-body">
                <i class="i-Financial"></i>
                <div class="ml-4">
                    <p class="text-muted mt-2 mb-0">Total Uang Diterima</p>
                    <p class="text-success text-24 line-height-1 mb-2 js-totalProfit">{{\Helper::getAmountDisplay(($totalIncome - $data['totalFeeTransfer']))}}</p>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection

@section('page-js')
<script src="{{asset('assets/js/vendor/echarts.min.js')}}"></script>
<script src="{{asset('assets/js/es5/echart.options.min.js')}}"></script>
<script src="{{asset('assets/js/es5/dashboard.v1.script.js')}}"></script>
<script>
    // getDashboard();
    // setInterval(() => {
    //     getDashboard()
    // }, 10000);
    
    function getDashboard(){
        var baseUrl = {!! json_encode(url('/')) !!}
        $.ajax({
            url: baseUrl + '/live-dashboard',
            method:'GET',
            dataType:'json',
            success:function(res){
                if (res) {
                    $('.js-totalCheckinObject').text(res.totalCheckinObject);
                    $('.js-totalCheckinRide').text(res.totalCheckinRide);
                    $('.js-totalFeeTransfer').text(res.totalFeeTransfer);
                    $('.js-totalParking').text(res.totalParking);
                    $('.js-totalPassenger').text(res.totalPassenger);
                    $('.js-totalTicketSales').text(res.totalTicketSales);
                    $('.js-totalVoucherSales').text(res.totalVoucherSales);
                    $('.js-totalProfit').text(res.totalProfit);
                }
            },
            error: function(res) {
                console.log('ERROR', res);
            }
        });
    }
</script>

@endsection