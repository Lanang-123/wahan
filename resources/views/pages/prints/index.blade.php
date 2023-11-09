@extends('layouts.master')
@section('page-css')
  <link rel="stylesheet" href="{{asset('assets/styles/vendor/sweetalert2.min.css')}}">
@endsection
@section('main-content')
    <div class="row">
        <div class="col-md-12">
            <div class="card text-left">
                <div class="card-body">
					<div class="row mb-3">
                        <div class="col-md-6"><h4>Print</h4></div>
                        @if (count($data) > 0)
                            <div class="col-md-6 text-right">
                                <a href="{{ route('new-print') }}" class="btn btn-sm btn-info">
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
                    @if (count($data) > 0)
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Tanggal</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Type</th>
                                        <th scope="col">total</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $key => $item)
                                        <tr>
                                            <th scope="row">{{$key + 1}}</th>
                                            <td>{{ $item->created_at_display }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ \Str::title($item->type) }}</td>
                                            <td>{{ $item->total }}</td>
                                            <td>{{ $item->status_display }}</td>
                                            <td width="80">
                                                <a href="{{ route('download-print', ['id' => $item->id]) }}" target="_blank" class="text-info ml-1" data-toggle="tooltip" data-placement="bottom" title="Cetak">
                                                    <i class="h5 nav-icon i-Fax text-20 "></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else 
                        <div class="py-4">
                            <div class="text-center mb-2">Tidak ada hasil yang ditemukan</div>
                            <div class="text-center">
                                <a href="{{ route('new-print') }}" class="btn btn-sm btn-info">
                                    <i class="h6 nav-icon i-Add mr-1 "></i>
                                    Tambah
                                </a>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

@section('page-js')
<script src="{{asset('assets/js/tooltip.script.js')}}"></script>
<script src="{{asset('assets/js/vendor/sweetalert2.min.js')}}"></script>
@endsection