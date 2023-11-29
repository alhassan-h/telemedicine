@extends('layouts.dash')

@php($analytics = $data['analytics'])

@section('content')
<div id="content" class="main-content">
    <div class="layout-px-spacing">

        <div class="row">
            <div class="col-6 mb-xl-0 mb-4">
                <div class="card" style="background-color: gray">
                <div class="card-header p-3 pt-2">
                    <div class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                    <i class="fa fa-cart-plus opacity-10"></i>
                    </div>
                    <div class="text-end pt-1">
                    <p class="mb-3 text-capitalize" style="color: #fff; font-size: 1.5rem">[Doctors]</p>
                    <h4 class="mb-0" style="color: #000">{{$analytics['doctors_count']}}</h4>
                    </div>
                </div>
                <hr class="dark horizontal my-0">
                <div class="card-footer p-3">
                    <p class="mb-0"><span class="text-success text-sm font-weight-bolder"></span></p>
                </div>
                </div>
            </div>
        
            <div class="col-6">
                <div class="card" style="background-color: gray">
                    <div class="card-header p-3 pt-2">
                        <div class="icon icon-lg icon-shape bg-gradient-info shadow-info text-center border-radius-xl mt-n4 position-absolute">
                        <i class="fa fa-cart-arrow-down opacity-10"></i>
                        </div>
                        <div class="text-end pt-1">
                        <p class="mb-3 text-capitalize" style="color: #fff; font-size: 1.5rem">[Patients]</p>
                        <h4 class="mb-0" style="color: #000">{{$analytics['patients_count']}}</h4>
                        </div>
                    </div>
                    <hr class="dark horizontal my-0">
                    <div class="card-footer p-3">
                        <p class="mb-0"><span class="text-success text-sm font-weight-bolder"></span></p>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection