@extends('layouts.dash')
@php($appointments = $data['appointments'])

@section('content')
<div id="content" class="main-content">
    <div class="layout-px-spacing">

        <div class="row layout-top-spacing sales">
            <div class="col-12 layout-spacing">
                <div class="widget widget-card-one">
                    <div class="widget-heading">
                        <div class="media">
                            <div class="media-body">
                                <div class="course">
                                    <h3>Video Conference</h3>
                                    <p class="meta-date"></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row layout-top-spacing sales">
            <div class="col-12 layout-spacing">
                <div class="widget widget-card-one">
                    <div class="widget-heading">
                        <div class="media">
                            <div class="media-body">
                                <div class="course">
                                    <!-- <h3>Video Conference</h3> -->
                                    <p class="meta-date">Choose a Patient to start call</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="widget-content">
                        <div class="row">
                            <div class="col-12">
                                <form action="" method="post">
                                    <div class="form-row mb-4">
                                        <div class="form-group col-md-6">
                                            <label for="appointment">Select Patient</label>
                                            <select id="appointment" class="form-control">
                                                <option selected="">Choose...</option>
                                                @foreach($appointments as $appointment)
                                                    <option value="{{$appointment->id}}">{{$appointment->patient->getFullname()}} - ({{strtolower($appointment->patient->getEmail())}})</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-row mb-4">
                                        <!-- <button id="yt-video-link" type="button" class="btn btn-primary mb-2 mr-2">Start Call</button>
                                        <div class="modal fade show" id="videoMedia1" tabindex="-1" role="dialog" aria-labelledby="videoMedia1Label" style="display: block; padding-right: 15px;" aria-modal="true">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header" id="videoMedia1Label">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body p-0">
                                                        <div class="video-container"> 
                                                            <iframe
                                                                width="560" height="315" 
                                                                class="h-100 w-100"
                                                                src="https://whereby.com/ashmed-virtual-consultation"
                                                                allow="camera; microphone; fullscreen; speaker; display-capture; autoplay; compute-pressure">
                                                            </iframe>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> -->

                                        <button type="button" class="btn btn-primary mb-2 ml-2" data-toggle="modal" data-target="#approveAppReq">Start Call</button>
                                        <div class="modal fade" id="approveAppReq" tabindex="-1" role="dialog" aria-labelledby="approveAppReqLabel" aria-hidden="true">
                                            <div class="modal-dialog w-100px" role="document">
                                                <div class="modal-content h-100">
                                                    <div class="modal-header">
                                                        <h5 class="text-center modal-title" id="approveAppReqLabel">Virtual Consultation</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <iframe
                                                            width="560" height="315" 
                                                            class="h-100 w-100"
                                                            src="https://whereby.com/ashmed-virtual-consultation"
                                                            allow="camera; microphone; fullscreen; speaker; display-capture; autoplay; compute-pressure">
                                                        </iframe>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection