@extends('layouts.dash')

@php($patients = $data['patients'])
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
                                <h3 class="text-dark">Appointments Schedule</h3>
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
                                    <h6 class="text-success">Approved Appointments</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="widget-content">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Patient</th>
                                        <th>Date & Time</th>
                                        <th>summary</th>
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
                                            <td>{{date('M d, Y H:m A',strtotime("$appointment->date $appointment->time"))}}</td>
                                            <td>{{ucfirst($appointment->summary)}}</td>
                                            <td class="d-flex justify-content-around">
                                                <div class="">
                                                    <button class="btn btn-danger" type="submit" data-toggle="modal" data-target="#cancelAppReq-{{$appointment->id}}">Cancel</button>
                                                    <div class="modal fade" id="cancelAppReq-{{$appointment->id}}" tabindex="-1" role="dialog" aria-labelledby="cancelAppReq-{{$appointment->id}}Label" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="cancelAppReq-{{$appointment->id}}Label">Confirm Appointment Cancellation</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form method="post" id="cancelAppReq-{{$appointment->id}}Form" action="{{route('doctor.appointment.cancel')}}">
                                                                        @csrf
                                                                        <input type="hidden" name="appointment_id" value="{{$appointment->id}}">
                                                                        <div class="text-center">
                                                                            <h3>Are You Sure?</h3>
                                                                            <h6>You want to cancel appointment with</h6>
                                                                            <p class="mb-0 text-secondary">{{$appointment->getPatient()->getFullname()}} ({{$appointment->getPatient()->getEmail()}})</p>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                                <div class="modal-footer d-flex justify-content-around">
                                                                    <button class="btn mr-4" data-dismiss="modal"><i class="flaticon-cancel-12"></i> close</button>
                                                                    <button type="submit" class="btn btn-danger" form="cancelAppReq-{{$appointment->id}}Form">Yes, Cancel</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
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
                                    <h6 class="text-secondary">Appointment Requestes</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="widget-content">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Patient</th>
                                        <th>Date & Time</th>
                                        <th>summary</th>
                                        <th>action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($appointments as $appointment)
                                    @if($appointment->action == 'noaction')
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td class="d-flex align-items-center">
                                            @php($profile = $appointment->getPatient()->getProfilePicture())
                                            <img class="profile-pic mr-3" src='{{asset("storage/images/users/$profile")}}'>
                                            {{$appointment->getPatient()->getFullname()}}
                                        </td>
                                        <td>{{date('M d, Y H:m A',strtotime("$appointment->date $appointment->time"))}}</td>
                                        <td>{{ucfirst($appointment->summary)}}</td>
                                        <td class="d-flex justify-content-around">
                                            <div class="approve">
                                                <button type="button" class="btn btn-primary mb-2 mr-2" data-toggle="modal" data-target="#approveAppReq-{{$appointment->id}}">Approve</button>
                                                <div class="modal fade" id="approveAppReq-{{$appointment->id}}" tabindex="-1" role="dialog" aria-labelledby="approveAppReq-{{$appointment->id}}Label" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="approveAppReq-{{$appointment->id}}Label">Approve Appointment Request</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p class="text-primary mb-3 p-0">You may adjust the date and time in accordance with your schedule.</p>
                                                                <form method="post" id="approveAppReq-{{$appointment->id}}Form" action="{{route('doctor.appointment.approve')}}">
                                                                    @csrf
                                                                    <input type="hidden" name="appointment_id" value="{{$appointment->id}}">
                                                                    <div class="row mb-4">
                                                                        <div class="col">
                                                                            <label for="eventDate">Appointment Date</label>
                                                                            <input type="date" class="form-control" name="date" value="{{$appointment->date}}">
                                                                        </div>
                                                                        <div class="col">
                                                                            <label for="eventTime">Appointment Time</label>
                                                                            <input type="time" class="form-control" name="time" value="{{$appointment->time}}">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group mb-4">
                                                                        <label for="summary">Summary</label>
                                                                        <textarea rows="2" class="form-control" name="summary"  placeholder="Type in call appointment summary...." disabled>{{$appointment->summary}}</textarea>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                            <div class="modal-footer d-flex justify-content-around">
                                                                <button class="btn mr-4" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Cancel</button>
                                                                <button type="submit" class="btn btn-success" form="approveAppReq-{{$appointment->id}}Form">Approve</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="reject">
                                                <button class="btn btn-danger" type="submit" data-toggle="modal" data-target="#rejectAppReq-{{$appointment->id}}">Reject</button>
                                                <div class="modal fade" id="rejectAppReq-{{$appointment->id}}" tabindex="-1" role="dialog" aria-labelledby="rejectAppReq-{{$appointment->id}}Label" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="rejectAppReq-{{$appointment->id}}Label">Confirm Appointment Request Rejection</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form method="post" id="rejectAppReq-{{$appointment->id}}Form" action="{{route('doctor.appointment.reject')}}">
                                                                    @csrf
                                                                    <input type="hidden" name="appointment_id" value="{{$appointment->id}}">
                                                                    <div class="text-center">
                                                                        <h3>Are You Sure?</h3>
                                                                        <h6>You want to reject request from</h6>
                                                                        <p class="mb-0 text-secondary">{{$appointment->getPatient()->getFullname()}} ({{$appointment->getPatient()->getEmail()}})</p>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                            <div class="modal-footer d-flex justify-content-around">
                                                                <button class="btn mr-4" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Cancel</button>
                                                                <button type="submit" class="btn btn-danger" form="rejectAppReq-{{$appointment->id}}Form">Yes, Reject</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>                    
        </div>

    </div>
</div>

@endsection