@extends('layouts.dash')

@section('content')
<div id="content" class="main-content">
    <div class="layout-px-spacing">

        <div class="row layout-top-spacing sales">
            <div class="col-12 layout-spacing">
                <div class="widget widget-card-one dash-hero bg">
                    <div class="">
                        <div class="row sales hero-profile">
                            <div class="col-xl-5 col-lg-6 col-md-12 col-sm-12 col-12 hp-left">
                                <div class="h-profile">
                                    <div class="hp-img-circle">
                                        @php($profile = Auth::user()->patient->getProfilePicture())
                                        <img src='{{asset("storage/images/users/$profile")}}'>
                                    </div>
                                    <div class="hp-bio">
                                        <h5 class="hp-name mb-2">{{Auth::user()->patient->getFullname()}}</h5>
                                        <p class="hp-dept-name">{{(Auth::user()->patient->getEmail())}}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-5 col-lg-6 col-md-12 col-sm-12 col-12 hp-right">
                                <div class="hp-stat attendance">
                                    <div class="indicator">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
                                        <h5>{{$data['appt_count']}}</h5>
                                    </div>
                                    <p>Appointments</p>
                                </div>
                                <div class="hp-stat grade">
                                    <div class="indicator">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-copy"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path></svg>
                                        <h5>{{$data['req_count']}}</h5>
                                    </div>
                                    <p>Requests</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row layout-top-spacing sales">

            <div class="col-12 layout-spacing">
                <div class="widget widget-table-one">
                    <div class="widget-heading mb-5">
                        <h5 class="todays-classses">Scheduled Appointments</h5>
                    </div>
                    <div class="widget-content">
                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                            @foreach($data['appointments'] as $appointment)
                            <div class="transactions-list">
                                <div class="t-item">
                                    <div class="t-company-name">
                                        <div class="t-icon">
                                            <div class="icon">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-play-circle"><circle cx="12" cy="12" r="10"></circle><polygon points="10 8 16 12 10 16 10 8"></polygon></svg>
                                            </div>
                                        </div>
                                        <div class="t-name">
                                            <h4>Dr. {{$appointment->doctor->getFullname()}}</h4>
                                            <p class="meta-date">{{date('M d, Y ',strtotime("$appointment->date"))}}</p>
                                        </div>

                                    </div>
                                    <div class="t-rate rate-dec">
                                        <p><span></span> {{date('H:m A',strtotime("$appointment->time"))}}</p>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection