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
					<div class="d-flex justify-content-between mb-2">
						<h4>Data Kelompok</h4>
						<button type="button" class="btn btn-sm btn-info">
							<i class="h6 nav-icon i-Add mr-1 "></i>
							Tambah Kelompok
						</button>
					</div>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nama Kelompok</th>
                                    <th scope="col">Ketua</th>
                                    <th scope="col">Bendahara</th>
                                    <th scope="col">Jenis Kelompok</th>
                                    <th scope="col">Tanggal Sosialisasi</th>
                                    <th scope="col">Tanggal Masuk</th>
                                    <th scope="col">Jumlah Anggota</th>
                                    <th scope="col">Jenis Usaha</th>
                                    <th scope="col">Alamat</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
								@for ($i = 0; $i < 8; $i++)
								<tr>
                                    <th scope="row">{{$i+1}}</th>
                                    <td>Petani Jaya Makmur</td>
                                    <td>Jhon</td>
                                    <td>Due</td>
                                    <td>KMK</td>
                                    <td>1 Jan 2020</td>
                                    <td>12 Jan 2020</td>
                                    <td>12</td>
                                    <td>Pertanian</td>
                                    <td>Sangsit</td>
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
