@extends('layouts.master')
@section('main-content')
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                
                <form class="form" action="{{ route('create-object') }}" method="post">
                    @csrf
                    <div class="card-body">
                        <div class="card-title mb-3">Check in Objek</div>
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
                                    <label>Kode tiket</label>
                                    <div class="input-group">
                                        <input type="text" name="code" value="{{ !empty(old('code')) ? old('code') : '' }}" class="form-control js-init-focus" placeholder="Masukkan kode tiket">
                                    </div>
                                    @if($errors->has('code'))
                                        <small class="text-danger">{{$errors->first('code')}}</small>
                                    @endif
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


