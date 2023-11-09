@extends('layouts.master')
@section('main-content')
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <form action="{{ route('update-ticket-expiration') }}" method="post">
                    @csrf
                    <div class="card-body">
                        <div class="card-title mb-3">Kadaluarsa Tiket</div>
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
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="firstName1">Masa kadaluarsa tiket</label>
                                    <div class="input-group">
                                        <input type="text" name="ticket_expiration" value="{{ !empty(old('ticket_expiration')) ? old('ticket_expiration') : $ticket_expiration }}" class="form-control" placeholder="Masukkan kadaluarsa tiket">
                                        <div class="input-group-append">
                                            <span class="input-group-text" id="basic-addon1">Jam</span>
                                        </div>
                                    </div>
                                    @if($errors->has('ticket_expiration'))
                                        <small class="text-danger">{{$errors->first('ticket_expiration')}}</small>
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
