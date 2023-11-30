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
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Patient</th>
                                                <th>action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($appointments as $appointment)
                                                @if($appointment->action == 'approved')
                                                <tr>
                                                    <td>{{$loop->iteration}}</td>
                                                    <td class="d-flex align-items-center">
                                                        @php($profile = $appointment->getPatient()->getProfilePicture())
                                                        <img class="profile-pic mr-3" src='{{asset("storage/images/users/$profile")}}'>
                                                        {{$appointment->getPatient()->getFullname()}}
                                                    </td>
                                                    <td class="">
                                                        <div class="">
                                                            @if($appointment->status == 'pending')
                                                            <button class="btn btn-success" type="submit" data-toggle="modal" data-target="#cancelAppReq-{{$appointment->id}}">Start Call</button>
                                                            <div class="modal fade" id="cancelAppReq-{{$appointment->id}}" tabindex="-1" role="dialog" aria-labelledby="cancelAppReq-{{$appointment->id}}Label" aria-hidden="true">
                                                                <div class="modal-dialog" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="cancelAppReq-{{$appointment->id}}Label">Starting Video Call</h5>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <form method="post" id="cancelAppReq-{{$appointment->id}}Form" action="{{route('doctor.videochats.start')}}">
                                                                                @csrf
                                                                                <input type="hidden" name="appointment_id" value="{{$appointment->id}}">
                                                                                <div class="text-center">
                                                                                    <h3>Start Video Call?</h3>
                                                                                    <h6>You are about to start call with</h6>
                                                                                    <p class="mb-0 text-secondary">{{$appointment->getPatient()->getFullname()}} ({{$appointment->getPatient()->getEmail()}})</p>
                                                                                </div>
                                                                            </form>
                                                                        </div>
                                                                        <div class="modal-footer d-flex justify-content-around">
                                                                            <button class="btn mr-4" data-dismiss="modal"><i class="flaticon-cancel-12"></i> close</button>
                                                                            <button type="submit" class="btn btn-success" form="cancelAppReq-{{$appointment->id}}Form">Yes, Start</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            @else
                                                            <button class="btn btn-danger" type="submit" data-toggle="modal" data-target="#endCall-{{$appointment->id}}">End Call</button>
                                                            <div class="modal fade" id="endCall-{{$appointment->id}}" tabindex="-1" role="dialog" aria-labelledby="endCall-{{$appointment->id}}Label" aria-hidden="true">
                                                                <div class="modal-dialog" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="endCall-{{$appointment->id}}Label">End Video Call</h5>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <form method="post" id="endCall-{{$appointment->id}}Form" action="{{route('doctor.videochats.end')}}">
                                                                                @csrf
                                                                                <input type="hidden" name="appointment_id" value="{{$appointment->id}}">
                                                                                <div class="text-center">
                                                                                    <h3>End Video Call?</h3>
                                                                                    <h6>You are about to end call with</h6>
                                                                                    <p class="mb-0 text-secondary">{{$appointment->getPatient()->getFullname()}} ({{$appointment->getPatient()->getEmail()}})</p>
                                                                                </div>
                                                                            </form>
                                                                        </div>
                                                                        <div class="modal-footer d-flex justify-content-around">
                                                                            <button class="btn mr-4" data-dismiss="modal"><i class="flaticon-cancel-12"></i> close</button>
                                                                            <button type="submit" class="btn btn-danger" form="endCall-{{$appointment->id}}Form">Yes, End</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            @endif
                                                        </div>
                                                    </td>
                                                </tr>
                                                @endif
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="form-row ml-3 my-4">
                                <button type="button" class="btn btn-primary mb-2 ml-2" data-toggle="modal" data-target="#approveAppReq">Open Video Call</button>
                                <div class="modal fade" id="approveAppReq" tabindex="-1" role="dialog" aria-labelledby="approveAppReqLabel" aria-hidden="true">
                                    <div class="modal-dialog w-100px" role="document">
                                        <div class="modal-content h-100">
                                            <div class="modal-header">
                                                <h5 class="text-center modal-title" id="approveAppReqLabel">Virtual Consultation with {{$appointment->getPatient()->getFullname()}}</h5>
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
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection