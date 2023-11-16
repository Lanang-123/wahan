@extends('layouts.master')
@section('main-content')
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="card-title mb-3 d-flex justify-content-between">
                        <span>Penjualan tiket/voucher</span>
                        <span>{{$currentDate}}</span>
                    </div>
                    <div class="separator-breadcrumb border-top"></div>
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
                    @if ($data)
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <h5>Nomor Polisi: <strong>{{$data->police_number}}</strong></h5> 
                                    <h5>Total Penumpang: <strong>{{$data->total_passengers}}</strong></h5> 
                                    <h5>Menggunakan Driver: <strong>
                                        @if ($data->is_fee)
                                            Ya
                                        @else
                                            Tidak
                                        @endif
                                        </strong></h5> 
                                </div>
                                <div class="col-md-4">
                                    <h5>Nomor Polisi: <strong>{{$data->police_number}}</strong></h5> 
                                    <h5>Total Penumpang: <strong>{{$data->total_passengers}}</strong></h5> 
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                        <div id="orderForm" class="card mb-3" data-url={{url('orders/check-code')}} data-total-ticket={{$data->total_passengers}}>
                            <div class="card-body">
                                <div class="form-row">
                                    <div class="col-md-4 ticket">
                                        <label for="picker1">Masukkan Kode</label>
                                        <input type="text" name="code" value="" class="form-control js-init-focus js-scan-with-parking" placeholder="Masukkan kode tiket" autocomplete="off">
                                    </div>
                                    <div class="col-md-8 d-flex align-items-end justify-content-end">
                                        <h4>Total Items: <strong><span class="total-item">0</span>/{{$data->total_passengers}}</strong></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <form class="form" action="{{ route('create-order', ['parking_id' => $data->id]) }}" method="post">
                            @csrf
                            @if($errors->has('orders'))
                                <small class="text-danger">{{$errors->first('orders')}}</small>
                            @endif
                            <div class="table-responsive">
                                <table id="cart" class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Jenis Produk</th>
                                            <th scope="col">Code</th>
                                            <th scope="col">Harga</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                            <div class="card">
                                <div class="card-body text-center">
                                    <div class="mb-2">TOTAL</div>
                                    <div class="custom-separator"></div>
                                    <div><h2 class="text-success">Rp <span class="total-price">0</span></h2></div>
                                </div>
                            </div>
                            <div class="custom-separator"></div>
                            <div class="form-row">
                                <div class="col-md-12 form-group mb-3">
                                    <label for="picker1">Menggunakan guide?</label>
                                    <div>
                                        <label class="switch switch-success mr-3">
                                            <input type="checkbox" name="use_guide" {{ !empty(old('use_guide') AND old('use_guide') == '1') ? 'checked' : '' }}>
                                            <span class="slider"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="js-guide col-md-4 form-group mb-3" style="display: none">
                                    <label for="picker1">Guide</label>
                                    <select class="js-autocomplete2 form-control" data-json="{{json_encode($guides)}}" data-selected="{{ !empty(old('guide_id')) ? old('guide_id') : '' }}" name="guide_id" value="{{ !empty(old('guide_id')) ? old('guide_id') : '' }}" >
                                        @foreach ($guides as $guide)
                                            <option value="{{$guide['id']}}">{{$guide['member_number']}} - {{$guide['name']}}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('guide_id'))
                                        <small class="text-danger">{{$errors->first('guide_id')}}</small>
                                    @endif
                                </div>
                            </div>
                            <div class="custom-separator"></div>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                        
                        
                </div>
            </div>
        </div>
    </div>
@endsection
