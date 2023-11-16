@extends('layouts.master')
@section('main-content')
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <form class="form" action="{{ route('accepted-handover', ['id' => $data['id']]) }}" method="post">
                    @csrf
                    <div class="card-body">
                        <div class="card-title mb-3">Form serah terima {{$data->type}}</div>
                        <div class="separator-breadcrumb border-top"></div>
                        <div class="row mb-4">
                            <div class="col-md-12 text-20">
                                <div>Total {{$data->type}}: {{$data->total}}</div>
                            </div>
                        </div>
                        <div class="row">
                            @if ($items AND count($items) > 0)
                                @foreach ($items as $item)
                                    <div class="col-md-1 form-group mb-3 text-center">
                                        {!! QrCode::size(50)->generate($item->code) !!}
                                        <div>{{$item->code}}</div>
                                    </div>
                                @endforeach
                                
                            @endif
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-danger">Terima</button>
                        <a href="{{ route('handover-list') }}" class="btn btn-outline-light">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
