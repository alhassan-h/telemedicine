@extends('layouts.dash')

@php($analytics = $data['analytics'])

@section('content')
<div id="content" class="main-content">
    <div class="layout-px-spacing">

        <div class="row layout-top-spacing sales">
            <div class="col-12 layout-spacing">
                <div class="widget widget-card-one dash-hero">
                    <div class="">
                        <div class="row sales hero-profile">
                            <div class="col-xl-5 col-lg-6 col-md-12 col-sm-12 col-12 hp-left">
                                <div class="h-profile">
                                    <div class="hp-img-circle">
                                        <img src="{{asset('storage/images/users/no_profile.jpeg')}}">
                                    </div>
                                    <div class="hp-bio">
                                        <h5 class="hp-name">Hassan Alhassan</h5>
                                        <p class="hp-dept-name">CS</p>
                                        <p class="hp-level">400L</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-5 col-lg-6 col-md-12 col-sm-12 col-12 hp-right">
                                <div class="hp-stat courses-count">
                                    <div class="indicator">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-layers"><polygon points="12 2 2 7 12 12 22 7 12 2"></polygon><polyline points="2 17 12 22 22 17"></polyline><polyline points="2 12 12 17 22 12"></polyline></svg>
                                        <h5>10 </h5>
                                    </div>
                                    <p>Courses</p>
                                </div>
                                <div class="hp-stat attendance">
                                    <div class="indicator">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
                                        <h5>92%</h5>
                                    </div>
                                    <p>Attendance</p>
                                </div>
                                <div class="hp-stat grade">
                                    <div class="indicator">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-award"><circle cx="12" cy="8" r="7"></circle><polyline points="8.21 13.89 7 23 12 20 17 23 15.79 13.88"></polyline></svg>
                                    <h5>4.48</h5>
                                    </div>
                                    <p>Grade</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row layout-top-spacing sales">

            <div class="col-xl-6 col-lg-12 col-md-6 col-sm-12 col-12 layout-spacing">
                <div class="widget widget-table-one">
                    <div class="widget-heading">
                        <h5 class="todays-classses">Todays Classes</h5>
                    </div>
                    <div class="widget-content">
                        <div class="transactions-list">
                            <div class="t-item">
                                <div class="t-company-name">
                                    <div class="t-icon">
                                        <div class="icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-play-circle"><circle cx="12" cy="12" r="10"></circle><polygon points="10 8 16 12 10 16 10 8"></polygon></svg>
                                        </div>
                                    </div>
                                    <div class="t-name">
                                        <h4>COSC401</h4>
                                        <p class="meta-date">8:00AM - 10:00AM</p>
                                    </div>

                                </div>
                                <div class="t-rate rate-dec">
                                    <p><span>2 hours</span> </p>
                                </div>
                            </div>
                        </div>
                        <div class="transactions-list">
                            <div class="t-item">
                                <div class="t-company-name">
                                    <div class="t-icon">
                                        <div class="icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-play-circle"><circle cx="12" cy="12" r="10"></circle><polygon points="10 8 16 12 10 16 10 8"></polygon></svg>
                                        </div>
                                    </div>
                                    <div class="t-name">
                                        <h4>COSC403</h4>
                                        <p class="meta-date">10:00AM - 12:00PM</p>
                                    </div>

                                </div>
                                <div class="t-rate rate-dec">
                                    <p><span>2 hours</span> </p>
                                </div>
                            </div>
                        </div>
                        <div class="transactions-list">
                            <div class="t-item">
                                <div class="t-company-name">
                                    <div class="t-icon">
                                        <div class="icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-play-circle"><circle cx="12" cy="12" r="10"></circle><polygon points="10 8 16 12 10 16 10 8"></polygon></svg>
                                        </div>
                                    </div>
                                    <div class="t-name">
                                        <h4>COSC405</h4>
                                        <p class="meta-date">12:00PM - 1:00PM</p>
                                    </div>

                                </div>
                                <div class="t-rate rate-dec">
                                    <p><span>2 hours</span> </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-6 col-lg-12 col-md-6 col-sm-12 col-12 layout-spacing">
                <div class="widget widget-activity-three">
                    <div class="widget-heading justify-space-btw py-2">
                        <h5 class="">TESTOMETER</h5>
                    </div>

                    <div class="widget-content">
                        <div class="admin mt-container mx-auto ps ps--active-y">
                            <div class="timeline-line">
                                    <div class="item-timeline timeline-new">
                                    <div class="t-dot" data-original-title="" title="">
                                        <div class="t-success">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                        </div>
                                    </div>

                                    <div class="t-content">
                                        <div class="t-uppercontent">
                                            <h5>COSC401</h5>
                                            <span class="">28 Feb, 2020</span>
                                        </div>
                                        <p><b>40 mins</b> MCQ test</p>
                                    </div>
                                </div>

                                <div class="item-timeline timeline-new">
                                    <div class="t-dot" data-original-title="" title="">
                                        <div class="t-primary"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check"><polyline points="20 6 9 17 4 12"></polyline></svg></div>
                                    </div>
                                    <div class="t-content">
                                        <div class="t-uppercontent">
                                            <h5>COSC403</h5>
                                            <span class="">27 Feb, 2020</span>
                                        </div>
                                        <p><b>40 mins</b> theory test</p>
                                    </div>
                                </div>

                                <div class="item-timeline timeline-new">
                                    <div class="t-dot" data-original-title="" title="">
                                        <div class="t-danger"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check"><polyline points="20 6 9 17 4 12"></polyline></svg></div>
                                    </div>
                                    <div class="t-content">
                                        <div class="t-uppercontent">
                                            <h5>COSC405</h5>
                                            <span class="">30 Feb, 2020</span>
                                        </div>
                                        <p><b>1 hr</b> coding test</p>
                                    </div>
                                </div>
                            </div>                                    
                            <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
                                <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
                            </div>
                            <div class="ps__rail-y" style="top: 0px; height: 325px; right: 0px;">
                                <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 222px;"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> 
        </div>

    </div>
</div>
@endsection