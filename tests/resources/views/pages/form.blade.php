@extends('layouts.master')
@section('main-content')
<div class="breadcrumb">
        <h1>Pengajuan Pinjaman</h1>
        {{-- <ul>
            <li><a href="">Prngajuan Pinjaman</a></li>
            <li>List</li>
        </ul> --}}
    </div>
    <div class="separator-breadcrumb border-top"></div>
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="card-title mb-3">Form Inputs</div>
                    <form >
                        <div class="row">
                            <div class="col-md-6 form-group mb-3">
                                <label for="firstName1">First name</label>
                                <input type="text" class="form-control" id="firstName1" placeholder="Enter your first name">
                            </div>

                            <div class="col-md-6 form-group mb-3">
                                <label for="lastName1">Last name</label>
                                <input type="text" class="form-control" id="lastName1" placeholder="Enter your last name">
                                <small id="passwordHelpBlock" class="ul-form__text form-text ">
                                    Please enter your full name
                                </small>
                            </div>

                            <div class="col-md-6 form-group mb-3">
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                                <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                            </div>

                            <div class="col-md-6 form-group mb-3">
                                <label for="phone">Phone</label>
                                <input class="form-control" id="phone" placeholder="Enter phone">
                            </div>

                            <div class="col-md-6 form-group mb-3">
                                <label for="credit1">Cradit card number</label>
                                <input class="form-control" id="credit1" placeholder="Card">
                            </div>

                            <div class="col-md-6 form-group mb-3">
                                <label for="website">Website</label>
                                <input class="form-control" id="website" placeholder="Web address">
                            </div>

                            <div class="col-md-6 form-group mb-3">
                                <label for="picker3">Birth date</label>
                                <div class="input-group">
                                    <input id="picker3" class="form-control" placeholder="yyyy-mm-dd" name="dp" >
                                    <div class="input-group-append">
                                        <button class="btn btn-secondary"  type="button">
                                            <i class="icon-regular i-Calendar-4"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 form-group mb-3">
                                <label for="picker1">Select</label>
                                <select class="form-control">
                                    <option>Option 1</option>
                                    <option>Option 1</option>
                                    <option>Option 1</option>
                                </select>
                            </div>
                            <div class="col-md-12 form-group mb-3">
                                <label for="picker1">Select</label>
                                <div>
                                    <label class="switch switch-success mr-3">
                                        <span>Success</span>
                                        <input type="checkbox" checked>
                                        <span class="slider"></span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-12 form-group mb-3">
                                <label for="picker1">Communication</label>
                                <label class="checkbox checkbox-outline-success">
                                    <input type="checkbox" checked>
                                    <span>E-mail</span>
                                    <span class="checkmark"></span>
                                </label>
                                <label class="checkbox checkbox-outline-success">
                                    <input type="checkbox" checked>
                                    <span>Phone</span>
                                    <span class="checkmark"></span>
                                </label>
                                <label class="checkbox checkbox-outline-success">
                                    <input type="checkbox" checked>
                                    <span>SMS</span>
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="col-md-12 form-group mb-3">
                                <label for="picker1">Transaction</label>
                                <label class="radio radio-outline-success">
                                    <input type="radio" name="radio" [value]="1" formControlName="radio">
                                    <span>Internet Banking</span>
                                    <span class="checkmark"></span>
                                </label>
                                <label class="radio radio-outline-success">
                                    <input type="radio" name="radio" [value]="2" formControlName="radio">
                                    <span>Mobile Banking</span>
                                    <span class="checkmark"></span>
                                </label>
                                <label class="radio radio-outline-success">
                                    <input type="radio" name="radio" [value]="3" formControlName="radio">
                                    <span>Sms Banking</span>
                                    <span class="checkmark"></span>
                                </label>
                            </div>

                            <div class="col-md-12">
                                 <button class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
