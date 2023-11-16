@extends('layouts.master')
@section('main-content')
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                
                <form class="form" action="{{ route('create-parking') }}" method="post">
                    @csrf
                    <div class="card-body">
                        <div class="card-title mb-3">Check in parkir</div>
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
                                <div class="col-md-12 form-group mb-3">
                                    <label for="picker1">Jenis kendaraan</label>

                                    <div class="ul-form__radio-inline">
                                        @foreach ($carTypes as $key => $carType)
                                        <label class=" ul-radio__position radio radio-primary form-check-inline mr-4">
                                            <input class="js-car-type" data-json="{{json_encode($carTypes)}}" type="radio" name="car_type_id" value="{{$carType['id']}}">
                                            <span class="ul-form__radio-font">{{$carType['name']}}<div>{{number_format($carType['price'],0, ',', '.')}}</div></span>
                                            <span class="checkmark"></span>
                                        </label>
                                        @endforeach
                                    </div>
                                    @if($errors->has('car_type_id'))
                                        <small class="text-danger">{{$errors->first('car_type_id')}}</small>
                                    @endif
                                </div>
                                
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-4 form-group mb-3">
                                            <label>Nomor Polisi</label>
                                            <div class="input-group">
                                                <input type="number" name="police_number" value="{{ !empty(old('police_number')) ? old('police_number') : '' }}" class="form-control" placeholder="Masukkan nomor polisi">
                                            </div>
                                            @if($errors->has('police_number'))
                                                <small class="text-danger">{{$errors->first('police_number')}}</small>
                                            @endif
                                        </div>
                                        <div class="col-md-4 form-group mb-3">
                                            <label for="firstName1">Jumlah penumpang</label>
                                            <input type="number" name="total_passengers" value="{{ !empty(old('total_passengers')) ? old('total_passengers') : '' }}" class="form-control" placeholder="Masukkan jumlah penumpang">
                                            @if($errors->has('total_passengers'))
                                                <small class="text-danger">{{$errors->first('total_passengers')}}</small>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 form-group mb-3">
                                    <label for="picker1">Wisatawan</label>
                                    <div class="ul-form__radio-inline">
                                        <label class=" ul-radio__position radio radio-primary form-check-inline">
                                            <input type="radio" name="traveler_type" value="domestik" checked>
                                            <span class="ul-form__radio-font">Domestik</span>
                                            <span class="checkmark"></span>
                                        </label>
                                        <label class=" ul-radio__position radio radio-primary form-check-inline">
                                            <input type="radio" name="traveler_type" value="asing">
                                            <span class="ul-form__radio-font">Asing</span>
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    @if($errors->has('traveler_type'))
                                        <small class="text-danger">{{$errors->first('traveler_type')}}</small>
                                    @endif
                                </div>
                                <div class="js-guide col-md-4 form-group mb-3">
                                    <label for="picker1">Asal negara</label>
                                    <select class="js-autocomplete2 form-control" data-json="{{json_encode($countries)}}" data-selected="{{ !empty(old('country')) ? old('country') : '' }}" name="country" value="{{ !empty(old('country')) ? old('country') : '' }}" >
                                        <option value="">-- Pilih Asal Negara --</option>
                                        @foreach ($countries as $country)
                                            <option value="{{$country}}">{{$country}}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('country'))
                                        <small class="text-danger">{{$errors->first('country')}}</small>
                                    @endif
                                </div>
                                <div class="col-md-12 form-group mb-3">
                                    <label for="picker1">Menggunakan driver?</label>
                                    <div class="ul-form__radio-inline">
                                        <label class=" ul-radio__position radio radio-primary form-check-inline">
                                            <input type="radio" name="is_fee" value="1" checked>
                                            <span class="ul-form__radio-font">Ya</span>
                                            <span class="checkmark"></span>
                                        </label>
                                        <label class=" ul-radio__position radio radio-primary form-check-inline">
                                            <input type="radio" name="is_fee" value="0">
                                            <span class="ul-form__radio-font">Tidak</span>
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    @if($errors->has('is_fee'))
                                        <small class="text-danger">{{$errors->first('is_fee')}}</small>
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
