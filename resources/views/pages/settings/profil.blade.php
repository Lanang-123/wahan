@extends('layouts.master')
@section('main-content')
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <form action="{{ route('update-profil') }}" method="post">
                    @csrf
                    <div class="card-body">
                        <div class="card-title mb-3">Profil</div>
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
                            <div class="col-md-12">
                                <h5>Kabag</h5>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="firstName1">Nama</label>
                                    <input type="text" name="name" value="{{ !empty(old('name')) ? old('name') : $head_of_division->name }}" class="form-control" placeholder="Masukkan nama kepala bidang">
                                    @if($errors->has('name'))
                                        <small class="text-danger">{{$errors->first('name')}}</small>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="firstName1">Umur</label>
                                    <div class="input-group">
                                        <input type="text" name="age" value="{{ !empty(old('age')) ? old('age') : $head_of_division->age }}" class="form-control" placeholder="Masukkan nama kepala bidang">
                                        <div class="input-group-append">
                                            <span class="input-group-text" id="basic-addon1">Tahun</span>
                                        </div>
                                    </div>
                                    @if($errors->has('age'))
                                        <small class="text-danger">{{$errors->first('age')}}</small>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group mb-3">
                                    <label for="firstName1">Jabatan</label>
                                    <textarea class="form-control" name="position">{{ !empty(old('position')) ? old('position') : $head_of_division->position }}</textarea>
                                    @if($errors->has('position'))
                                        <small class="text-danger">{{$errors->first('position')}}</small>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group mb-3">
                                    <label for="firstName1">Alamat</label>
                                    <textarea class="form-control" name="address">{{ !empty(old('address')) ? old('address') : $head_of_division->address }}</textarea>
                                    @if($errors->has('address'))
                                        <small class="text-danger">{{$errors->first('address')}}</small>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="custom-separator"></div>
                        <div class="form-row">
                            <div class="col-md-12">
                                <h5>Ketua</h5>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="firstName1">Nama</label>
                                    <input type="text" name="head" value="{{ !empty(old('head')) ? old('head') : $head }}" class="form-control" id="firstName1" placeholder="Masukkan nama ketua">
                                    @if($errors->has('head'))
                                        <small class="text-danger">{{$errors->first('head')}}</small>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="custom-separator"></div>
                        <div class="form-row">
                            <div class="col-md-12">
                                <h5>Kasir</h5>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="firstName1">Nama</label>
                                    <input type="text" name="cashier" value="{{ !empty(old('cashier')) ? old('cashier') : $cashier }}" class="form-control" id="firstName1" placeholder="Masukkan nama ketua">
                                    @if($errors->has('cashier'))
                                        <small class="text-danger">{{$errors->first('cashier')}}</small>
                                    @endif
                                </div>
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
