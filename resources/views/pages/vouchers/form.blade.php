@extends('layouts.master')
@section('main-content')
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                @if ($item)
                    <form class="form" action="{{ route('update-voucher', ['slug' => $item['slug']]) }}" method="post">
                @else
                    <form class="form" action="{{ route('create-voucher') }}" method="post">
                @endif
                    @csrf
                    <div class="card-body">
                        <div class="card-title mb-3">{{($item) ? 'Ubah' : 'Tambah'}} Voucher</div>
                            {{-- <div class="separator-breadcrumb border-top"></div> --}}
                            <div class="row">
                                <div class="col-md-4 form-group mb-3">
                                    <label>Nominal</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">Rp</span>
                                        </div>
                                        <input type="text" value="{{ !empty(old('nominal')) ? old('nominal') : (($item) ? $item['nominal'] : '0') }}" name="nominal" class="currencyFormat select-all form-control" placeholder="Masukkan nominal">
                                    </div>
                                    @if($errors->has('nominal'))
                                        <small class="text-danger">{{$errors->first('nominal')}}</small>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 form-group mb-3">
                                    <label>Jumlah generate voucher</label>
                                    <div class="input-group">
                                        <input type="number" name="total" value="{{ !empty(old('total')) ? old('total') : (($item) ? $item['total'] : '') }}" class="form-control" placeholder="Masukkan jumlah">
                                        
                                    </div>
                                    @if($errors->has('total'))
                                        <small class="text-danger">{{$errors->first('total')}}</small>
                                    @endif
                                </div>
                            </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('voucher-list') }}" class="btn btn-outline-light">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
