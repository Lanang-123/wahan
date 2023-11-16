@extends('layouts.master')
@section('main-content')
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                
                <form action="{{ route('update-password-user', ['uuid' => $item['uuid']]) }}" method="post">
                    @csrf
                    <div class="card-body">
                        <div class="card-title mb-3">{{($item) ? 'Edit' : 'Tambah'}} Password</div>
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
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="firstName1">Password Lama</label>
                                    <input type="password" name="old_password" class="form-control" placeholder="Masukkan password lama">
                                    @if($errors->has('old_password'))
                                        <small class="text-danger">{{$errors->first('old_password')}}</small>
                                    @endif
                                </div>
                            </div>
                        </div>    
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="firstName1">Password Baru</label>
                                    <input type="password" name="password" class="form-control" placeholder="Masukkan password">
                                    @if($errors->has('password'))
                                        <small class="text-danger">{{$errors->first('password')}}</small>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="firstName1">Konfirmasi Password Baru</label>
                                    <input type="password" name="password_confirmation" class="form-control" placeholder="Masukkan konfirmasi password">
                                    @if($errors->has('password_confirmation'))
                                        <small class="text-danger">{{$errors->first('password_confirmation')}}</small>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('user-list') }}" class="btn btn-outline-light">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
