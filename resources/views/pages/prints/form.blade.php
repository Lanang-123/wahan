@extends('layouts.master')
@section('main-content')
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                @if ($item)
                    <form class="form" action="{{ route('update-print', ['slug' => $item['slug']]) }}" method="post">
                @else
                    <form class="form" action="{{ route('create-print') }}" method="post">
                @endif
                    @csrf
                    <div class="card-body">
                        <div class="card-title mb-3">{{($item) ? 'Ubah' : 'Tambah'}} Cetak Ticket/Voucher</div>
                        <div class="separator-breadcrumb border-top"></div>
                            
                            <div class="row">
                                <div class="col-md-4 form-group mb-3">
                                    <label>Nama</label>
                                    <div class="input-group">
                                        <input type="text" name="name" value="{{ !empty(old('name')) ? old('name') : (($item) ? $item['name'] : '') }}" class="form-control" placeholder="Masukkan nama">
                                    </div>
                                    @if($errors->has('name'))
                                        <small class="text-danger">{{$errors->first('name')}}</small>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 form-group mb-3">
                                    <label for="picker1">Jenis produk</label>
                                    <div class="input-group">
                                        <select class="form-control product-type" name="type">
                                            @foreach ($productTypes as $option)
                                            <option value="{{$option}}" {{ !empty(old('type') AND old('type') == $option) ? 'selected' : (($item AND $item['type'] == $option) ? 'selected' : '') }}>{{ \Str::title($option) }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @if($errors->has('type'))
                                        <small class="text-danger">{{$errors->first('type')}}</small>
                                    @endif
                                </div>
                            </div>
                            <div id="ticket" class="row">
                                <div class="col-md-12 form-group mb-3">
                                    <label>Pilih Tiket</label>
                                    @if (count($ticketData) > 0)
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">
                                                            <label class="checkbox checkbox-outline-success mb-2 mr-4">
                                                                <input class="choose-all" data-child="ticket" type="checkbox">
                                                                <span>Pilih semua</span>
                                                                <span class="checkmark"></span>
                                                            </label>
                                                        </th>
                                                        <th scope="col">QR Code</th>
                                                        <th scope="col">Ticket type</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($ticketData as $key => $item)
                                                        <tr>
                                                            <th scope="row">
                                                                <label class="checkbox checkbox-outline-success mb-2 mr-4">
                                                                    <input class="menu ticket" type="checkbox" name="product_items[{{$item->code}}]">
                                                                    <span>{{ $item->code }}</span>
                                                                    <span class="checkmark"></span>
                                                                </label>
                                                                </th>
                                                            <td>{!! QrCode::size(50)->generate($item->code) !!}</td>
                                                            <td>{{ $item->ticket_type_name }}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    @else 
                                        <div class="py-4">
                                            <div class="text-center mb-2">Tidak ada hasil yang ditemukan</div>
                                            <div class="text-center">
                                                <a href="{{ route('new-ticket') }}" class="btn btn-sm btn-info">
                                                    <i class="h6 nav-icon i-Add mr-1 "></i>
                                                    Tambah
                                                </a>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div id="voucher" class="row" style="display: none;">
                                <div class="col-md-12 form-group mb-3">
                                    <label>Pilih Voucher</label>
                                    @if (count($voucherData) > 0)
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">
                                                            <label class="checkbox checkbox-outline-success mb-2 mr-4">
                                                                <input class="choose-all" data-child="voucher" type="checkbox">
                                                                <span>Pilih semua</span>
                                                                <span class="checkmark"></span>
                                                            </label>
                                                        </th>
                                                        <th scope="col">QR Code</th>
                                                        <th scope="col">nominal</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($voucherData as $key => $item)
                                                        <tr>
                                                            <th scope="row">
                                                                <label class="checkbox checkbox-outline-success mb-2 mr-4">
                                                                    <input class="menu voucher" type="checkbox" name="product_items[{{$item->code}}]">
                                                                    <span>{{ $item->code }}</span>
                                                                    <span class="checkmark"></span>
                                                                </label>
                                                            </th>
                                                            <td>{!! QrCode::size(50)->generate($item->code) !!}</td>
                                                            <td>{{ $item->nominal }}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    @else 
                                        <div class="py-4">
                                            <div class="text-center mb-2">Tidak ada hasil yang ditemukan</div>
                                            <div class="text-center">
                                                <a href="{{ route('new-ticket') }}" class="btn btn-sm btn-info">
                                                    <i class="h6 nav-icon i-Add mr-1 "></i>
                                                    Tambah
                                                </a>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('print-list') }}" class="btn btn-outline-light">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
