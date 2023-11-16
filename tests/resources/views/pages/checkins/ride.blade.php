@extends('layouts.master')
@section('main-content')
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                
                <form class="form" action="{{ route('create-checkin-ride') }}" method="post">
                    @csrf
                    <div class="card-body">
                        <div class="card-title mb-3">Check in wahana</div>
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
                            <div class="form-row">
                                
                                <div class="col-md-4 form-group mb-3">
                                    <label for="picker1">Wahana</label>
                                    <select class="js-ride js-autocomplete form-control" data-json="{{json_encode($rides)}}" data-selected="{{ !empty(old('ride_id')) ? old('ride_id') : '' }}" name="ride_id" value="{{ !empty(old('ride_id')) ? old('ride_id') : '' }}" >
                                        <option value="">-- Pilih wahana --</option>
                                        @foreach ($rides as $ride)
                                            <option value="{{$ride['id']}}">{{$ride['name']}}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('ride_id'))
                                        <small class="text-danger">{{$errors->first('ride_id')}}</small>
                                    @endif
                                </div>
                                
                                <div class="col-md-4 form-group mb-3">
                                    <label>Kode tiket</label>
                                    <div class="input-group">
                                        <input type="text" name="code" value="{{ !empty(old('code')) ? old('code') : '' }}" class="form-control" placeholder="Masukkan nomor polisi">
                                    </div>
                                    @if($errors->has('code'))
                                        <small class="text-danger">{{$errors->first('code')}}</small>
                                    @endif
                                </div>
                            </div>
                            <div class="custom-separator"></div>
                            <div class="row">
                                <div class="col-md-4 ">
                                    <div>Total</div>
                                    <div class="text-success text-26 js-price">0</div>
                                </div>
                            </div>
                            
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
