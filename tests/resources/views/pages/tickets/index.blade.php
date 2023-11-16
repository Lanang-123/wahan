@extends('layouts.master')
@section('page-css')
  <link rel="stylesheet" href="{{asset('assets/styles/vendor/sweetalert2.min.css')}}">
@endsection
@section('main-content')
    <div class="row">
        <div class="col-md-12">
            <div class="card text-left">
                <form action="{{ route('ticket-list') }}" method="get">
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-md-6"><h4>Tiket</h4></div>
                            @if (count($data) > 0)
                                <div class="col-md-6 text-right">
                                    <a href="{{ route('new-ticket') }}" class="btn btn-sm btn-info">
                                        <i class="h6 nav-icon i-Add mr-1 "></i>
                                        Tambah
                                    </a>
                                </div>
                            @endif
                        </div>
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
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <h5><i class="i-Filter-2 mr-2"></i>Filter</h5>
                            </div>
                            <div class="row col-md-12">
                                <div class="col-md-3 mb-3">
                                    <label>Status</label>
                                    <div class="input-group">
                                        <select class="js-autocomplete form-control" name="status" data-selected="{{$status}}" value="{{$status}}">
                                            <option value="">-- Semua status --</option>
                                            @foreach ($ticketStatuses as $item)
                                                <option value="{{$item}}" {{($item == $status)? 'selected': ''}}>{{\Str::title($item)}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2 form-group mb-3">
                                    <label>Kode tiket</label>
                                    <div class="input-group mt-1">
                                        <input type="text" name="code" value="{{$code}}" class="form-control" placeholder="Masukkan kode tiket" autocomplete="off">
                                    </div>
                                </div>
                                <div class="col-md-2 mb-3 d-flex align-items-center">
                                    <button type="submit" class="btn btn-danger" >Filter</button>
                                </div>
                                <div class="col-md-4">
                                    <div class="card">
                                        <div class="card-body text-center">
                                            <p class="text-primary text-24 line-height-1 mb-2"><span class="text-12 mr-2">Total Data:</span><span>{{$data->total()}}</span></p>
                                            <div>
                                                <a href="{{route('delete-expired-ticket')}}" class="btn btn-danger" >Hapus tiket kadaluarsa</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if (count($data) > 0)
                        
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">QR Code</th>
                                            <th scope="col">Code</th>
                                            <th scope="col">Ticket type</th>
                                            <th scope="col">Status</th>
                                            {{-- <th scope="col">Action</th> --}}
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $key => $item)
    
                                            <tr>
                                                <th scope="row">{{$data->firstItem() + $key}}</th>
                                                <td>{!! QrCode::size(50)->generate($item->code) !!}</td>
                                                <td>{{ $item->code }}</td>
                                                <td>{{ $item->ticket_type_name }}</td>
                                                <td>{{ $item->status_display }}</td>
                                                {{-- <td>
                                                    @if ($item->is_active)
                                                        <span class="badge badge-success">Aktif</span>
                                                    @else
                                                        <span class="badge badge-danger">Tidak aktif</span>
                                                    @endif
                                                </td> --}}
                                                {{-- <td width="80">
                                                    <a href="{{ route('edit-ticket', ['code' => $item->code])}}" class="text-warning mr-2" data-toggle="tooltip" data-placement="bottom" title="Edit">
                                                        <i class="h5 nav-icon i-Pen-2 font-weight-bold"></i>
                                                    </a>
                                                    <a href="{{ route('delete-ticket', ['code' => $item->code]) }}" class="text-danger mr-2 alert-confirm" data-toggle="tooltip" data-placement="bottom" id="" title="Delete">
                                                        <i class="h5 nav-icon i-Close-Window font-weight-bold"></i>
                                                    </a>
                                                </td> --}}
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-md-12 mt-5 text-center">
                                {{ $data->appends($_GET)->links() }}
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
                </form>
            </div>
        </div>
    </div>
@endsection

@section('page-js')
<script src="{{asset('assets/js/tooltip.script.js')}}"></script>
<script src="{{asset('assets/js/vendor/sweetalert2.min.js')}}"></script>
@endsection