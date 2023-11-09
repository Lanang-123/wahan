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
                        <div class="col-md-6"><h4>Serah terima tiket/voucher</h4></div>
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
                                            <td width="100">
                                                <a href="{{ route('detail-handover', ['id' => $item->id]) }}" class="btn btn-sm btn-danger">
                                                    Detail
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