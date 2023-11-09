@extends('layouts.master')
@section('main-content')
<div class="breadcrumb">
    <h1>Selamat Datang...</h1>
</div>

<div class="separator-breadcrumb border-top"></div>

<div class="row">
    <!-- ICON BG -->
    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-icon-bg card-icon-bg-primary o-hidden mb-4">
            <div class="card-body">
                <i class="i-Business-ManWoman"></i>
                <div class="ml-2">
                    <p class="text-muted mt-2 mb-0">Total Kelompok</p>
                    <p class="text-primary text-24 line-height-1 mb-2">205</p>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-icon-bg card-icon-bg-primary o-hidden mb-4">
            <div class="card-body text-center">
                <i class="i-Boy"></i>
                <div class="ml-2">
                    <p class="text-muted mt-2 mb-0">Total Anggota</p>
                    <p class="text-primary text-24 line-height-1 mb-2">44.021</p>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-icon-bg card-icon-bg-primary o-hidden mb-4">
            <div class="card-body">
                <i class="i-Money-2"></i>
                <div class="ml-2">
                    <p class="text-muted mt-2 mb-0">Total Donatur</p>
                    <p class="text-primary text-24 line-height-1 mb-2">80</p>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-icon-bg card-icon-bg-primary o-hidden mb-4">
            <div class="card-body">
                <i class="i-Money-2"></i>
                <div class="ml-2">
                    <p class="text-muted mt-2 mb-0">Saldo terakhir</p>
                    <p class="text-primary text-24 line-height-1 mb-2">Rp 2.000</p>
                </div>
            </div>
        </div>
    </div>

</div>


@endsection

@section('page-js')
<script src="{{asset('assets/js/vendor/echarts.min.js')}}"></script>
<script src="{{asset('assets/js/es5/echart.options.min.js')}}"></script>
<script src="{{asset('assets/js/es5/dashboard.v1.script.js')}}"></script>

@endsection