@extends('layouts.master')
@section('main-content')
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                @if ($item)
                    <form class="form" action="{{ route('update-guide', ['uuid' => $item['uuid']]) }}" method="post">
                    <input type="hidden" name="id" value="{{$item->id}}" >
                @else
                    <form class="form" action="{{ route('create-guide') }}" method="post">
                @endif
                    @csrf
                    <div class="card-body">
                        <div class="card-title mb-3">{{($item) ? 'Ubah' : 'Tambah'}} Guide</div>
                        <div class="separator-breadcrumb border-top"></div>
                            <div class="form-row">
                                
                                <div class="col-md-4 form-group mb-3">
                                    <label>Nama</label>
                                    <div class="input-group">
                                        <input type="text" name="name" value="{{ !empty(old('name')) ? old('name') : (($item) ? $item['name'] : '') }}" class="form-control" placeholder="Masukkan nama">
                                    </div>
                                    @if($errors->has('name'))
                                        <small class="text-danger">{{$errors->first('name')}}</small>
                                    @endif
                                </div>
                                <div class="col-md-4 form-group mb-3">
                                    <label for="firstName1">KTP</label>
                                    <input type="number" name="id_card_number" value="{{ !empty(old('id_card_number')) ? old('id_card_number') : (($item) ? $item['id_card_number'] : '') }}" class="form-control" placeholder="Masukkan ktp">
                                    @if($errors->has('id_card_number'))
                                        <small class="text-danger">{{$errors->first('id_card_number')}}</small>
                                    @endif
                                </div>
                                <div class="col-md-4 form-group mb-3">
                                    <label for="exampleInputEmail1">Telepon</label>
                                    <input type="number" name="phone" value="{{ !empty(old('phone')) ? old('phone') : (($item) ? $item['phone'] : '') }}" class="form-control" id="exampleInputEmail1" placeholder="Masukkan telepon">
                                    @if($errors->has('phone'))
                                        <small class="text-danger">{{$errors->first('phone')}}</small>
                                    @endif
                                </div>
                                <div class="col-md-12 form-group mb-3">
                                    <label for="exampleInputEmail1">Keterangan</label>
                                    <textarea name="description" class="form-control" id="lastName1" placeholder="Masukkan keterangan">{{ !empty(old('description')) ? old('description') : (($item) ? $item['description'] : '') }}</textarea>
                                    <small id="passwordHelpBlock" class="ul-form__text form-text ">
                                        Silakan masukkan keterangan 
                                    </small>
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
                            <div class="custom-separator"></div>
                            <div class="form-row">
                                <div class="col-md-12 form-group mb-3">
                                    <label for="picker1">Punya Bank Akun?</label>
                                    <div>
                                        <label class="switch switch-success mr-3">
                                            <input type="checkbox" name="have_bank_account" value="1" {{ !empty(old('have_bank_account') AND old('have_bank_account') == '1') ? 'checked' : (($item AND $item['have_bank_account'] == 1) ? 'checked' : '') }}>
                                            <span class="slider"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-4 form-group mb-3">
                                    <label for="picker1">Nama bank</label>
                                    <select class="js-autocomplete form-control" data-selected="{{ !empty(old('bank_name')) ? old('bank_name') : (($item) ? $item['bank_name'] : '') }}" name="bank_name" value="{{ !empty(old('bank_name')) ? old('bank_name') : (($item) ? $item['bank_name'] : '') }}" >
                                        <option value="">-- Pilih bank --</option>
                                        @foreach ($banks as $bankItem)
                                            <option value="{{$bankItem['name']}}">{{$bankItem['name']}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-4 form-group mb-3">
                                    <label for="firstName1">Nomor rekening bank</label>
                                    <input type="number" name="bank_account_number" value="{{ !empty(old('bank_account_number')) ? old('bank_account_number') : (($item) ? $item['bank_account_number'] : '') }}" class="form-control" placeholder="Masukkan nomor rekening">
                                    @if($errors->has('bank_account_number'))
                                        <small class="text-danger">{{$errors->first('bank_account_number')}}</small>
                                    @endif
                                </div>
                                <div class="col-md-4 form-group mb-3">
                                    <label>Nama bank akun</label>
                                    <div class="input-group">
                                        <input type="text" name="bank_account_name" value="{{ !empty(old('bank_account_name')) ? old('bank_account_name') : (($item) ? $item['bank_account_name'] : '') }}" class="form-control" placeholder="Masukkan nama akun bank">
                                    </div>
                                    @if($errors->has('bank_account_name'))
                                        <small class="text-danger">{{$errors->first('bank_account_name')}}</small>
                                    @endif
                                </div>
                            </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('guide-list') }}" class="btn btn-outline-light">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
