@extends('layouts.master')

@section('main-content')
    <div class="row">
        <div class="col-md-12">
            <div class="card text-left">
                <div class="card-body">
					<div class="row mb-3">
                        <div class="col-md-6"><h4>Daftar Pengguna</h4></div>
                        @if (count($data) > 0)
                            <div class="col-md-6 text-right">
                                <a href="{{ route('new-user') }}" class="btn btn-sm btn-info">
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
                                        <th>#</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Jabatan</th>
                                        <th>Role</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $key => $item)
                                        <tr>
                                            <th scope="row">{{$key + 1}}</th>
                                            <td>{{ $item['name'] }}</td>
                                            <td>{{ $item['email'] }}</td>
                                            <td>{{ $item['job_position'] }}</td>
                                            <td>{{ $item['role_name'] }}</td>
                                            <td>
                                                @if ($item['is_active'])
                                                    <span class="badge badge-success">Aktif</span>
                                                @else
                                                    <span class="badge badge-danger">Tidak aktif</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('edit-user', ['uuid' => $item['uuid']])}}" class="text-warning mr-2" data-toggle="tooltip" data-placement="bottom" title="Edit Profil">
                                                    <i class="h5 nav-icon i-Pen-2 font-weight-bold"></i>
                                                </a>
                                                <a href="{{ route('edit-password-user', ['uuid' => $item['uuid']])}}" class="text-primary mr-2" data-toggle="tooltip" data-placement="bottom" title="Ubah Password">
                                                    <i class="h5 nav-icon i-Lock-2 font-weight-bold"></i>
                                                </a>
                                                @if ($item->role_id != 0)
                                                    <a href="{{ route('delete-user', ['uuid' => $item['uuid']]) }}" class="text-danger mr-2 alert-confirm" data-toggle="tooltip" data-placement="bottom" id="" title="Delete">
                                                        <i class="h5 nav-icon i-Close-Window font-weight-bold"></i>
                                                    </a>
                                                @endif
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
                                <a href="{{ route('new-user') }}" class="btn btn-sm btn-info">
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