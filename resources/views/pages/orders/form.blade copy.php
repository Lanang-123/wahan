@extends('layouts.master')
@section('main-content')
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <form class="form" action="{{ route('create-order') }}" method="post">
                    @csrf
                    <div class="card-body">
                        <div class="card-title mb-3">Penjualan tiket/voucher</div>
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
                        
                            <div id="orderForm" class="card mb-3">
                                <div class="card-body">
                                    <div class="form-row">
                                        <div class="col-md-4">
                                            <label for="picker1">Jenis produk</label>
                                            <select class="product-type js-autocomplete form-control" data-json="{{json_encode($productTypes)}}" data-selected="{{ !empty(old('product_type')) ? old('product_type') : '' }}" name="product_type" value="{{ !empty(old('product_type')) ? old('product_type') : '' }}" >
                                                
                                                @foreach ($productTypes as $productType)
                                                    <option value="{{$productType}}">{{$productType}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-4 ticket">
                                            <label for="picker1">Produk</label>
                                            <select class="product-id js-autocomplete1 form-control" data-ticket-json="{{json_encode($ticketData)}}" data-voucher-json="{{json_encode($voucherData)}}" data-selected="{{ !empty(old('product_id')) ? old('product_id') : '' }}" name="product_id" value="{{ !empty(old('product_id')) ? old('product_id') : '' }}" >
                                                @foreach ($ticketData as $ticket)
                                                    <option value="{{$ticket['id']}}">{{$ticket['text']}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-4 d-flex align-items-end">
                                            <button type="button" class="add-item btn btn-primary">Tambah</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @if($errors->has('orders'))
                                <small class="text-danger">{{$errors->first('orders')}}</small>
                            @endif
                            <div class="table-responsive">
                                <table id="cart" class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Jenis Produk</th>
                                            <th scope="col">Code</th>
                                            <th scope="col">Harga</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                            <div class="card">
                                <div class="card-body text-center">
                                    <div class="mb-2">TOTAL</div>
                                    <div class="custom-separator"></div>
                                    <div><h2 class="text-success">Rp <span class="total-price">0</span></h2></div>
                                </div>
                            </div>
                            <div class="custom-separator"></div>
                            <div class="form-row">
                                <div class="col-md-12 form-group mb-3">
                                    <label for="picker1">Menggunakan guide?</label>
                                    <div>
                                        <label class="switch switch-success mr-3">
                                            <input type="checkbox" name="use_guide" {{ !empty(old('use_guide') AND old('use_guide') == '1') ? 'checked' : '' }}>
                                            <span class="slider"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="js-guide col-md-4 form-group mb-3" style="display: none">
                                    <label for="picker1">Guide</label>
                                    <select class="js-autocomplete2 form-control" data-json="{{json_encode($guides)}}" data-selected="{{ !empty(old('guide_id')) ? old('guide_id') : '' }}" name="guide_id" value="{{ !empty(old('guide_id')) ? old('guide_id') : '' }}" >
                                        @foreach ($guides as $guide)
                                            <option value="{{$guide['id']}}">{{$guide['member_number']}} - {{$guide['name']}}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('guide_id'))
                                        <small class="text-danger">{{$errors->first('guide_id')}}</small>
                                    @endif
                                </div>
                            </div>
                            <div class="custom-separator"></div>
                            
                            
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
            <div class="card mb-4">
                <div class="card-body">
                    <div class="card-title mb-3">Daftar Penjualan tiket/voucher</div>
                    @if ($message = Session::get('cancelSuccess'))
                        <div class="alert alert-success alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>{{ $message }}</strong>
                        </div>
                    @endif

                    @if ($message = Session::get('cancelError'))
                        <div class="alert alert-danger alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>{{ $message }}</strong>
                        </div>
                    @endif
                    <form action="{{ route('new-order', ['date' => $currentDate]) }}" method="get">
                    <div class="row col-md-12">
                        <div class="col-md-3 mb-3">
                            <label>Dari tanggal</label>
                            <div class="input-group">
                                <input name="currentDate" value="{{ !empty(old('currentDate')) ? old('currentDate') : $currentDate }}" class="picker2 form-control form-control" placeholder="yyyy-mm-dd" >
                                <div class="input-group-append">
                                    <button class="btn btn-info"  type="button">
                                        <i class="icon-regular i-Calendar-4"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 mb-3 d-flex align-items-end">
                            <button type="submit" class="btn btn-danger" >Filter</button>
                        </div>
                    </div>
                    </form>
                    @if (count($orderData) > 0)
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Tanggal</th>
                                        <th scope="col">Nomor Order</th>
                                        <th scope="col">Total Ticket</th>
                                        <th scope="col">Total Voucher</th>
                                        <th scope="col">Total Item</th>
                                        <th scope="col">Total Harga</th>
                                        <th scope="col">Guide</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orderData as $key => $item)
                                        <tr>
                                            <th scope="row">{{$key + 1}}</th>
                                            <td>{{ $item->created_at_display }}</td>
                                            <td>{{ $item->order_number }}</td>
                                            <td>{{ $item->total_ticket }}</td>
                                            <td>{{ $item->total_voucher }}</td>
                                            <td>{{ $item->total_item }}</td>
                                            <td>{{ $item->total_price_display }}</td>
                                            <td>{{ $item->guide_name }}</td>
                                            <td>
                                                <a href="{{ route('cancel-order', ['id' => $item->id]) }}" class="btn btn-sm btn-danger alert-cancel">Batal</a>
                                                <a href="{{ route('print-order', ['id' => $item->id]) }}" class="btn btn-sm btn-warning">Cetak</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else 
                        <div class="py-4">
                            <div class="text-center mb-2">Tidak ada hasil yang ditemukan</div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
