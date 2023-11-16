@extends('layouts.master')
@section('main-content')
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                @if ($item)
                    <form action="{{ route('update-role', ['uuid' => $item['uuid']]) }}" method="post" autocomplete="off">
                    <input type="hidden" name="id" value="{{ $item->id }}">
                @else
                    <form action="{{ route('create-role') }}" method="post" autocomplete="off">
                @endif
                    @csrf
                    <div class="card-body">
                        <div class="card-title mb-3">{{($item) ? 'Edit' : 'Tambah'}} Role</div>
                        <div class="separator-breadcrumb border-top"></div>
                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label>Nama</label>
                                    <input type="text" name="name" value="{{ !empty(old('name')) ? old('name') : (($item) ? $item['name'] : '') }}" class="form-control" id="firstName1" placeholder="Masukkan name">
                                    @if($errors->has('name'))
                                        <small class="text-danger">{{$errors->first('name')}}</small>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="custom-separator"></div>
                        <div class="form-row">
                            <div class="col-md-12">
                                <h4>Akses</h4>
                            </div>

                            <div class="table-responsive">
                                <table class="table">
                                    <tr class="table-primary">
                                        <th width="200">Menu</th>
                                        <th>Item</th>
                                        <th class="text-right">Action</th>
                                    </tr>
                                    @foreach ($permissions as $lv1)
                                        <tr class="table-success">
                                            <th>
                                                <label class="checkbox checkbox-outline-success mb-2 mr-4">
                                                    <input class="menu" data-child="{{ $lv1['route_name'] }}" type="checkbox" name="{{ $lv1['route_name'] }}" {{(in_array($lv1['route_name'], $havePermissions)) ? 'checked' : ''}}>
                                                    <span>{{ $lv1['name'] }}</span>
                                                    <span class="checkmark"></span>
                                                </label>
                                            </th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                        @if (count($lv1['child']) > 0)
                                            @foreach ($lv1['child'] as $lv2)
                                                <tr>
                                                    <td></td>
                                                    <td>
                                                        <label class="checkbox checkbox-outline-success mb-2 mr-4">
                                                            <input class="menu {{ $lv1['route_name'] }}" data-child="{{ $lv2['route_name'] }}" type="checkbox" name="{{ $lv2['route_name'] }}" {{(in_array($lv2['route_name'], $havePermissions)) ? 'checked' : ''}}>
                                                            <span>{{ $lv2['name'] }}</span>
                                                            <span class="checkmark"></span>
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex justify-content-end">
                                                        @if (count($lv2['child']) > 0)
                                                            @foreach ($lv2['child'] as $lv3)
                                                                <label class="checkbox checkbox-outline-success mb-2 mr-4">
                                                                    <input class="{{ $lv1['route_name'] }} {{ $lv2['route_name'] }}" type="checkbox" name="{{ $lv3['route_name'] }}" {{(in_array($lv3['route_name'], $havePermissions)) ? 'checked' : ''}}>
                                                                    <span>{{ $lv3['name'] }}</span>
                                                                    <span class="checkmark"></span>
                                                                </label>
                                                            @endforeach
                                                        @endif
                                                        @if ($lv2['route_name'] == 'loan-verification-list')
                                                            @for ($i = 1; $i <= $numberOfApprover; $i++)
                                                                <label class="checkbox checkbox-outline-success mb-2 mr-4">
                                                                    <input class="{{ $lv1['route_name'] }} {{ $lv2['route_name'] }}" type="checkbox" name="process-loan-verification|reject-loan-verification|approve-loan-verification|approve-loan-verification|approver:{{ $i }}" {{(in_array('process-loan-verification|reject-loan-verification|approve-loan-verification|approve-loan-verification|approver:'.$i, $havePermissions)) ? 'checked' : ''}}>
                                                                    <span>Approver {{$i}}</span>
                                                                    <span class="checkmark"></span>
                                                                </label>
                                                            @endfor
                                                        @endif
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    @endforeach
                                    
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('role-list') }}" class="btn btn-outline-light">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
