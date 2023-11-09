@extends('layouts.master')
@section('main-content')
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                @if ($item)
                    <form class="form" action="{{ route('update-ride', ['slug' => $item['slug']]) }}" method="post">
                    <input type="hidden" name="id" value="{{$item->id}}" >
                @else
                    <form class="form" action="{{ route('create-ride') }}" method="post">
                @endif
                    @csrf
                    <div class="card-body">
                        <div class="card-title mb-3">{{($item) ? 'Ubah' : 'Tambah'}} Wahana</div>
                        <div class="separator-breadcrumb border-top"></div>
                            <div class="row">
                                <div class="col-md-6 form-group mb-3">
                                    <label for="picker1">Pemilik wahana</label>
                                    <div class="input-group">
                                        <select class="form-control" name="ride_owner_id">
                                            @foreach ($rideOwners as $option)
                                            <option value="{{$option['id']}}" {{ !empty(old('ride_owner_id') AND old('ride_owner_id') == $option['id']) ? 'selected' : (($item AND $item['ride_owner_id'] == $option['id']) ? 'selected' : '') }}>{{$option['name']}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @if($errors->has('ride_owner_id'))
                                        <small class="text-danger">{{$errors->first('ride_owner_id')}}</small>
                                    @endif
                                </div>

                                <div class="col-md-6 form-group mb-3">
                                    <label>Nama</label>
                                    <div class="input-group">
                                        <input type="text" name="name" value="{{ !empty(old('name')) ? old('name') : (($item) ? $item['name'] : '') }}" class="form-control" placeholder="Masukkan nama">
                                    </div>
                                    @if($errors->has('name'))
                                        <small class="text-danger">{{$errors->first('name')}}</small>
                                    @endif
                                </div>

                                <div class="col-md-6 form-group mb-3">
                                    <label>Harga</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">Rp</span>
                                        </div>
                                        <input type="text" value="{{ !empty(old('price')) ? old('price') : (($item) ? $item['price'] : '0') }}" name="price" class="currencyFormat select-all form-control" placeholder="Masukkan harga">
                                    </div>
                                    @if($errors->has('price'))
                                        <small class="text-danger">{{$errors->first('price')}}</small>
                                    @endif
                                </div>

                                <div class="col-md-6 form-group mb-3">
                                    <label>Fee</label>
                                    <div class="input-group">
                                        <input type="text" name="fee" value="{{ !empty(old('fee')) ? old('fee') : (($item) ? $item['fee'] : '0') }}" class="form-control currencyFormat select-all" placeholder="Masukkan fee">
                                        <div class="input-group-append">
                                            <span class="input-group-text" id="basic-addon1">%</span>
                                        </div>
                                    </div>
                                    @if($errors->has('fee'))
                                        <small class="text-danger">{{$errors->first('fee')}}</small>
                                    @endif
                                </div>
                                
                                <div class="col-md-12 form-group mb-3">
                                    <label for="picker1">Status</label>
                                    <div>
                                        <label class="switch switch-success mr-3">
                                            <input type="checkbox" name="is_active" value="1" {{ !empty(old('is_active') AND old('is_active') == '1') ? 'checked' : (($item AND $item['is_active'] == 1) ? 'checked' : '') }}>
                                            <span class="slider"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('ride-list') }}" class="btn btn-outline-light">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
