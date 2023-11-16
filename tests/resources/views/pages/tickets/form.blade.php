@extends('layouts.master')
@section('main-content')
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                @if ($item)
                    <form class="form" action="{{ route('update-ticket', ['slug' => $item['slug']]) }}" method="post">
                @else
                    <form class="form" action="{{ route('create-ticket') }}" method="post">
                @endif
                    @csrf
                    <div class="card-body">
                        <div class="card-title mb-3">{{($item) ? 'Ubah' : 'Tambah'}} Tiket</div>
                        <div class="separator-breadcrumb border-top"></div>
                            <div class="row">
                                <div class="col-md-4 form-group mb-3">
                                    <label for="picker1">Jenis tiket</label>
                                    <div class="input-group">
                                        <select class="form-control" name="ticket_type_id">
                                            @foreach ($ticketTypes as $option)
                                            <option value="{{$option['id']}}" {{ !empty(old('ticket_type_id') AND old('ticket_type_id') == $option['id']) ? 'selected' : (($item AND $item['ticket_type_id'] == $option['id']) ? 'selected' : '') }}>{{$option['name']}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @if($errors->has('ticket_type_id'))
                                        <small class="text-danger">{{$errors->first('ticket_type_id')}}</small>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 form-group mb-3">
                                    <label>Jumlah generate ticket</label>
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
                        <a href="{{ route('ticket-list') }}" class="btn btn-outline-light">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
