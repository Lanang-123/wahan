@extends('layouts.master')
@section('main-content')
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="card-title mb-3">Daftar Penjualan tiket/voucher</div>
                    @if ($message = Session::get('cancelSuccess'))
                        <div class="alert alert-success alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>{{ $message }}</strong>
                        </div>
                    @endif

                    @if ($message = Session::get('cancelError'))
                        <div class="alert alert-danger alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>{{ $message }}</strong>
                        </div>
                    @endif
                    <form action="{{ route('order-list', ['date' => $currentDate]) }}" method="get">
                    <div class="row col-md-12">
                        <div class="col-md-3 mb-3">
                            <label>Dari tanggal</label>
                            <div class="input-group">
                                <input name="currentDate" value="{{ !empty(old('currentDate')) ? old('currentDate') : $currentDate }}" class="picker2 form-control form-control" placeholder="yyyy-mm-dd" >
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
                    </form>
                    @if (count($orderData) > 0)
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
                                        <th scope="col">Total Harga</th>
                                        <th scope="col">Guide</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orderData as $key => $item)
                                        <tr>
                                            <th scope="row">{{$key + 1}}</th>
                                            <td>{{ $item->created_at_display }}</td>
                                            <td>{{ $item->order_number }}</td>
                                            <td>{{ $item->total_ticket }}</td>
                                            <td>{{ $item->total_voucher }}</td>
                                            <td>{{ $item->total_item }}</td>
                                            <td>{{ $item->total_price_display }}</td>
                                            <td>{{ $item->guide_name }}</td>
                                            <td>
                                                <a href="{{ route('cancel-order', ['id' => $item->id]) }}" class="btn btn-sm btn-danger alert-cancel">Batal</a>
                                                <a href="{{ route('print-order', ['id' => $item->id, 'from'=>'list']) }}" class="btn btn-sm btn-warning">Cetak</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else 
                        <div class="py-4">
                            <div class="text-center mb-2">Tidak ada hasil yang ditemukan</div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
