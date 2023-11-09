@extends('layouts.master')
@section('page-css')
  <link rel="stylesheet" href="{{asset('assets/styles/vendor/sweetalert2.min.css')}}">
@endsection
@section('main-content')
    <div class="row">
        <div class="col-md-12">
            <div class="card text-left">
                <form action="{{ route('report-checkout') }}" method="get">
                    <div class="card-body">
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
                                <div class="col-md-4 mb-3">
                                    <label>Jenis Produk</label>
                                    <div class="input-group">
                                        <select class="js-autocomplete form-control" name="type" data-selected="{{$type}}" value="{{$type}}">
                                            <option value="">-- Semua Jenis Produk --</option>
                                            @foreach ($types as $item)
                                                <option value="{{$item}}" {{($item == $type)? 'selected': ''}}>{{\Str::title($item)}}</option>
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
                            <div class="col-md-6"><h4>Laporan Tiket/Voucher keluar</h4></div>
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
                        {{-- {{dd($data)}} --}}
                        @if (count($data) > 0)
                            <div class="d-md-flex mb-3 justify-content-between">
                                <a href="{{ route('report-checkout', ['download' => true, 'startDate' => $startDate, 'endDate' => $endDate, 'type' => $type]) }}" class="btn btn-success"><i class="i-Download text-18 mr-2"></i> Download</a>
                                <div>Total Data : <span class="text-25 text-danger">{{$data->total()}}</span></div>
                            </div>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Tanggal</th>
                                            <th scope="col">Jenis Produk</th>
                                            <th scope="col">Kode</th>
                                            <th scope="col">Harga</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $key => $item)
                                            <tr>
                                                <th scope="row">{{$data->firstItem() + $key}}</th>
                                                <td>{{ $item->created_at_display }}</td>
                                                <td>{{ \Str::title($item->product_type) }}</td>
                                                <td>{{ $item->code }}</td>
                                                <td>{{ $item->price_display }}</td>
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