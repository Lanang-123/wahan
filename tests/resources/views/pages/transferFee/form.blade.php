@extends('layouts.master')
@section('main-content')
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                @if ($item)
                    <form class="form" action="{{ route('create-transfer-fee') }}" method="post">
                    <input type="hidden" name="id" value="{{$item->id}}" >
                @endif
                    @csrf
                    <div class="card-body">
                        <div class="card-title mb-3">Prosess Transfer fee</div>
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
                            <div class="row">
                                <div class="col-md-6 form-group mb-3">
                                    <h5>Nomor Order : <span class="font-weight-600">{{ $item->order_number}}</span></h5>
                                    <h5>Total Item : <span class="font-weight-600">{{ $item->total_item}}</span></h5>
                                    <h5>Total Order : <span class="font-weight-600">{{ $item->total_price_display}}</span></h5>
                                    <h5>Total Masuk Wahana : <span class="font-weight-600">{{ $item->total_price_checkin_ride_display}}</span></h5>
                                </div>
                                @if ($item->guide)
                                    <div class="col-md-6">
                                        <h5>Nama Guide : <span class="font-weight-600">{{ $item->guide->name }}</span></h5>
                                        <h5>Nomor Member : <span class="font-weight-600">{{ $item->guide->member_number }}</span></h5>
                                        <h5>Telepon : <span class="font-weight-600">{{ $item->guide->phone }}</span></h5>
                                        <h5>Akun Bank : <span class="font-weight-600">{{ $item->guide->bank_name }}</span></h5>
                                        <h5>Nomor Akun Bank : <span class="font-weight-600">{{ $item->guide->bank_account_number }}</span></h5>
                                        <h5>Nama Akun Bank : <span class="font-weight-600">{{ $item->guide->bank_account_name }}</span></h5>
                                    </div>
                                @endif
                            </div>
                            <div class="custom-separator"></div>
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-body text-center">
                                            <h6>Fee</h6>
                                            <h4 class="text-success font-weight-600">{{ $item->total_guide_fee_display}}</h4>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 form-group mb-3">
                                    <label for="picker1">Jenis Pembayaran</label>
                                    <div class="input-group">
                                        <select class="form-control" name="payment_type">
                                            @foreach ($paymentTypes as $payment)
                                            <option value="{{$payment}}" {{ !empty(old('payment_type') AND old('payment_type') == $payment) ? 'selected' : (($item AND $item['payment_type'] == $payment) ? 'selected' : '') }}>{{ \Str::title($payment)}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @if($errors->has('payment_type'))
                                        <small class="text-danger">{{$errors->first('payment_type')}}</small>
                                    @endif
                                </div>
                            </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('transfer-fee-list') }}" class="btn btn-outline-light">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
