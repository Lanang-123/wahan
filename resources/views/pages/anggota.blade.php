@extends('layouts.master')
@section('main-content')
{{-- <h4>Anggota</h4> --}}
    {{-- <div class="breadcrumb"> --}}
        {{-- <ul>
            <li><a href="">Anggota</a></li>
            <li>List</li>
        </ul> --}}
    {{-- </div> --}}
    {{-- <div class="separator-breadcrumb border-top"></div> --}}
    <div class="row">
        <div class="col-md-12">
            <div class="card text-left">

                <div class="card-body">
                    {{-- <p>
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.
                    </p> --}}
					<div class="d-flex justify-content-between align-items-end mb-2">
						<div class="mr-4">
							<h4>Daftar Anggota</h4>
							<div class="">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</div>
						</div>
						<button type="button" class="btn btn-sm btn-info">
							<i class="h6 nav-icon i-Add mr-1 "></i>
							Tambah Anggota
						</button>
					</div>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Ktp</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Alamat</th>
                                    <th scope="col">TTL</th>
                                    <th scope="col">Agama</th>
                                    <th scope="col">Pendidikan</th>
                                    <th scope="col">Pekerjaan</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
								@for ($i = 0; $i < 12; $i++)
								<tr>
                                    <th scope="row">{{$i+1}}</th>
                                    <td>1234</td>
                                    <td>Jhon</td>
                                    <td>Sangsit</td>
                                    <td>Sangsit, 20 Nov 1997</td>
                                    <td>Hindu</td>
                                    <td>S1</td>
                                    <td>Buruh</td>
                                    <td><span class="badge badge-success">Kawin</span></td>
                                    <td>
                                        <a href="#" class="text-warning mr-2">
                                            <i class="h5 nav-icon i-Pen-2 font-weight-bold"></i>
                                        </a>
                                        <a href="#" class="text-danger mr-2">
                                            <i class="h5 nav-icon i-Close-Window font-weight-bold"></i>
                                        </a>
                                    </td>
                                </tr>
								@endfor
                                

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
