@extends('layouts.master')
@section('page-css')
  <link rel="stylesheet" href="{{asset('assets/styles/vendor/sweetalert2.min.css')}}">
@endsection
@section('main-content')
    <div class="row">
        <div class="col-md-12">
            <div class="card text-left">
                <form action="{{ route('report-cancel-order') }}" method="get">
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <h5><i class="i-Filter-2 mr-2"></i>Filter</h5>
                            </div>
                            <div class="row col-md-12">
                                
                                <div class="col-md-4 mb-3">
                                    <label>Status</label>
                                    <div class="input-group">
                                        <select class="js-autocomplete form-control" name="orderId" data-selected="{{$orderId}}" value="{{$orderId}}">
                                            <option value="">-- Semua order --</option>
                                            @foreach ($orders as $item)
                                                <option value="{{$item->id}}" {{($item->id == $orderId)? 'selected': ''}}>{{ $item->order_number }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2 mb-3 d-flex align-items-end">
                                    <button type="submit" class="btn btn-danger" >Filter</button>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6"><h4>Laporan Penjualan dibatalkan</h4></div>
                        </div>
                        <div>
                            @if ($message = Session::get('success'))
                                <div class="alert alert-success alert-block">
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                    <strong>{{ $message }}</strong>
                                </div>
                            @endif

                            @if ($message = Session::get('error'))
                                <div class="alert alert-danger alert-block">
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                    <strong>{{ $message }}</strong>
                                </div>
                            @endif
                        </div>
                        @if (count($data) > 0)
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Tanggal</th>
                                            <th scope="col">Nomor Order</th>
                                            <th scope="col">Total Ticket</th>
                                            <th scope="col">Total Voucher</th>
                                            <th scope="col">Total Item</th>
                                            <th scope="col">Total Harga Tiket</th>
                                            <th scope="col">Total Harga Voucher</th>
                                            <th scope="col">Total Harga</th>
                                            <th scope="col">Guide</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $key => $item)
                                            <tr>
                                                <th scope="row">{{$data->firstItem() + $key}}</th>
                                                <td>{{ $item->created_at_display }}</td>
                                                <td>{{ $item->order_number }}</td>
                                                <td>{{ $item->total_ticket }}</td>
                                                <td>{{ $item->total_voucher }}</td>
                                                <td>{{ $item->total_item }}</td>
                                                <td>{{ $item->total_price_ticket }}</td>
                                                <td>{{ $item->total_price_voucher }}</td>
                                                <td>{{ $item->total_price_display }}</td>
                                                <td>{{ ($item->use_guide) ? 'Ya' : 'Tidak' }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-md-12 mt-5 text-center">
                                {{ $data->appends($_GET)->links() }}
                            </div>
                        @else 
                            <div class="py-4">
                                <div class="text-center mb-2">Tidak ada hasil yang ditemukan</div>
                            </div>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('page-js')
<script src="{{asset('assets/js/tooltip.script.js')}}"></script>
<script src="{{asset('assets/js/vendor/sweetalert2.min.js')}}"></script>
@endsection