@extends('layouts.master')
@section('main-content')


<div class="row">
    <!-- ICON BG -->
    <div class="col-lg-12 col-md-6 col-sm-6">
        <div class="form-row">
                                
            <div class="col-md-4 form-group mb-3">
                <label>Kode tiket</label>
                <div class="input-group">
                    <input type="text" name="code" value="" class="form-control js-init-focus js-scan" placeholder="Masukkan kode tiket">
                </div>
                @if($errors->has('code'))
                    <small class="text-danger">{{$errors->first('code')}}</small>
                @endif
            </div>

            <table id="dataGrid" class="table">
                <thead>
                    <tr>
                        <th scope="col">Code</th>
                    </tr>
                </thead>
                <tbody>
                    
                </tbody>
            </table>
        </div>
    </div>

</div>


@endsection

@section('page-js')
<script src="{{asset('assets/js/vendor/echarts.min.js')}}"></script>
<script src="{{asset('assets/js/es5/echart.options.min.js')}}"></script>
<script src="{{asset('assets/js/es5/dashboard.v1.script.js')}}"></script>

@endsection