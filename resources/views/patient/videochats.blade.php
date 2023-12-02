@extends('layouts.dash')

@php($appointment = $data['appointment'])

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
                                    <p class="meta-date">When a doctor has started a call for your session. You can join it here.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="widget-content">
                        <div class="row">
                            <div class="col-8">
                                <form action="" method="post">
                                    <div class="form-row mb-4">
                                        <div class="form-group col-md-6">
                                            @if($appointment && $appointment->status == 'done')
                                            <p class="m-0 p-0 text-success">You have an ongoing call with Dr. {{$appointment->getDoctor()->getFullname()}}</p>
                                            @else
                                            <p class="m-0 p-0 text-danger">You have no ongoing call!</p>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-row mb-4">
                                        @if($appointment && $appointment->status == 'done')
                                        <button type="button" class="btn btn-primary mb-2 ml-2" data-toggle="modal" data-target="#approveAppReq">Join Call Now</button>
                                        <div class="modal fade" id="approveAppReq" tabindex="-1" role="dialog" aria-labelledby="approveAppReqLabel" aria-hidden="true">
                                            <div class="modal-dialog w-100px" role="document">
                                                <div class="modal-content h-100">
                                                    <div class="modal-header">
                                                        <h5 class="text-center modal-title" id="approveAppReqLabel">Virtual Consultation with Dr. {{$appointment->getDoctor()->getFullname()}}</h5>
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
                                        @endif
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