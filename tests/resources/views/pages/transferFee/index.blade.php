@extends('layouts.master')
@section('page-css')
  <link rel="stylesheet" href="{{asset('assets/styles/vendor/sweetalert2.min.css')}}">
@endsection
@section('main-content')
    <div class="row">
        <div class="col-md-12">
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
            <form action="{{ route('form-transfer-fee') }}" method="post">
                @csrf

                <div class="card text-left mb-4">
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-md-6"><h4>Transfer Fee Guide</h4></div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label>Nomor Order</label>
                                <div class="input-group">
                                    <input type="text" name="order_number" value="" class="form-control js-init-focus" placeholder="Masukkan nomor order">
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </form>
            <form action="{{ route('transfer-fee-list') }}" method="get">
                <div class="card text-left">
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-md-6"><h4>Daftar Transfer Fee Guide</h4></div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <h5><i class="i-Filter-2 mr-2"></i>Filter</h5>
                            </div>
                            <div class="row col-md-12">
                                <div class="col-md-4 mb-3">
                                    <label>Nomor Order</label>
                                    <div class="input-group">
                                        <select class="js-autocomplete form-control" name="order_number" data-selected="{{$order_number}}" value="{{$order_number}}">
                                            <option value="">-- Semua Order --</option>
                                            @foreach ($orderFilter as $itemFilter)
                                                <option value="{{$itemFilter->order_number}}" {{($itemFilter->order_number == $order_number)? 'selected': ''}}>{{ $itemFilter->order_number }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2 mb-3 d-flex align-items-end">
                                    <button type="submit" class="btn btn-danger" >Filter</button>
                                </div>
                            </div>
                        </div>

                        @if (count($data) > 0)
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Nomor Order</th>
                                            <th scope="col">Total Order </th>
                                            <th scope="col">Total Masuk Wahana </th>
                                            <th scope="col">Fee Masuk Wahana</th>
                                            <th scope="col">Fee Masuk Objek</th>
                                            <th scope="col">Total Fee</th>
                                            <th scope="col">Guide</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (count($data) == 1)
                                            @foreach ($data as $key => $item)
                                                <tr>
                                                    <th scope="row">{{$data->firstItem() + $key}}</th>
                                                    <td>{{ $item->order_number }}</td>
                                                    <td>{{ $item->total_price_display }}</td>
                                                    <td>{{ $item->total_price_checkin_ride_display }}</td>
                                                    <td>{{ $item->guide_fee_checkin_ride_display }}</td>
                                                    <td>{{ $item->guide_fee_checkin_object_display }}</td>
                                                    <td>{{ $item->total_guide_fee_display }}</td>
                                                    <td>{{ ($item->use_guide) ? 'Ya' : 'Tidak' }}</td>
                                                    <td width="80">
                                                        <a href="{{ route('edit-transfer-fee', ['id' => $item->id])}}" class="text-success mr-2" data-toggle="tooltip" data-placement="bottom" title="Transfer">
                                                            <i class="text-24 h5 nav-icon i-Credit-Card-3 "></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-md-12 mt-5 text-center">
                                {{ $data->links() }}
                            </div>
                        @else 
                            <div class="py-4">
                                <div class="text-center mb-2">Tidak ada hasil yang ditemukan</div>
                                
                            </div>
                        @endif
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('page-js')
<script src="{{asset('assets/js/tooltip.script.js')}}"></script>
<script src="{{asset('assets/js/vendor/sweetalert2.min.js')}}"></script>
@endsection