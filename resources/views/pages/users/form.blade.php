@extends('layouts.master')
@section('main-content')
    @php
        $helper = new \App\Helper\Helper;
    @endphp
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4"> 
                @if ($item)
                    <form action="{{ route('update-user', ['uuid' => $item['uuid']]) }}" method="post">
                    <input type="hidden" name="id" value="{{$item->id}}">    
                @else
                    <form action="{{ route('create-user') }}" method="post">
                @endif
                    @csrf
                    <div class="card-body">
                        <div class="card-title mb-3">{{($item) ? 'Edit' : 'Tambah'}} Pengguna</div>
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
                                        <label for="firstName1">Nama</label>
                                        <input type="text" name="name" value="{{ !empty(old('name')) ? old('name') : (($item) ? $item['name'] : '') }}" class="form-control" placeholder="Masukkan name">
                                        @if($errors->has('name'))
                                            <small class="text-danger">{{$errors->first('name')}}</small>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="firstName1">Email</label>
                                        <input type="text" name="email" value="{{ !empty(old('email')) ? old('email') : (($item) ? $item['email'] : '') }}" class="form-control" placeholder="Masukkan email">
                                        @if($errors->has('email'))
                                            <small class="text-danger">{{$errors->first('email')}}</small>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            @if (!$item)
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="firstName1">Password</label>
                                            <input type="password" name="password" value="{{ !empty(old('password')) ? old('password') : (($item) ? $item['password'] : '') }}" class="form-control" placeholder="Masukkan password">
                                            @if($errors->has('password'))
                                                <small class="text-danger">{{$errors->first('password')}}</small>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="firstName1">Konfirmasi Password</label>
                                            <input type="password" name="password_confirmation" value="{{ !empty(old('password_confirmation')) ? old('password_confirmation') : (($item) ? $item['password_confirmation'] : '') }}" class="form-control" placeholder="Masukkan konfirmasi password">
                                            @if($errors->has('password_confirmation'))
                                                <small class="text-danger">{{$errors->first('password_confirmation')}}</small>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endif

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="firstName1">Jabatan</label>
                                        <input type="text" name="job_position" value="{{ !empty(old('job_position')) ? old('job_position') : (($item) ? $item['job_position'] : '') }}" class="form-control" placeholder="Masukkan jabatan">
                                        @if($errors->has('job_position'))
                                            <small class="text-danger">{{$errors->first('job_position')}}</small>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            @if (($item AND $item->role_id == 0) OR !$helper->isSuperAdmin())
                                <input type="hidden" name="role_id" value="{{$item->role_id}}">
                                <input type="hidden" name="is_active" value="{{$item->is_active}}">
                            @else
                                <div class="row">
                                    <div class="col-md-6 form-group mb-3">
                                        <label for="firstName1">Role</label>
                                        <select class="form-control" name="role_id">
                                            @foreach ($roles as $option)
                                            <option value="{{$option['id']}}" {{ !empty(old('role_id') AND old('role_id') == $option['id']) ? 'selected' : (($item AND $item['role_id'] == $option['id']) ? 'selected' : '') }}>{{$option['name']}}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->has('role_id'))
                                            <small class="text-danger">{{$errors->first('role_id')}}</small>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
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
                            @endif
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
