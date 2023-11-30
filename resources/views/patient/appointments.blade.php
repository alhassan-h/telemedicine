@extends('layouts.dash')

@php($doctors = $data['doctors'])
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
                                    <h3>Video Conference Appointment</h3>
                                    <p class="meta-date text-primary">Schedule an appointment with a Doctor.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="widget-content">
                        <button type="button" class="btn btn-primary mb-2 mr-2" data-toggle="modal" data-target="#newAppointment">New appointment</button>
                        <div class="modal fade" id="newAppointment" tabindex="-1" role="dialog" aria-labelledby="newAppointmentLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="newAppointmentLabel">Request An Appointment</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="post" id="newAppointmentForm" action="{{route('patient.appointments.request')}}">
                                            @csrf
                                            <div class="form-group mb-4">
                                                <label for="doctor_id">Doctor</label>
                                                <select name="doctor_id" id="doctor_id" class="form-control">
                                                    <option value="">Choose...</option>
                                                    @foreach($doctors as $doctor)
                                                        <option value="{{$doctor->id}}">Dr. {{$doctor->getFullname()}} - {{ucwords($doctor->getSpecialization())}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="row mb-4">
                                                <div class="col">
                                                    <label for="eventDate">Appointment Date</label>
                                                    <input type="date" class="form-control" name="date">
                                                </div>
                                                <div class="col">
                                                    <label for="eventTime">Appointment Time</label>
                                                    <input type="time" class="form-control" name="time">
                                                </div>
                                            </div>
                                            <div class="form-group mb-4">
                                                <label for="summary">Summary</label>
                                                <textarea rows="2" class="form-control" name="summary" placeholder="Type in call appointment summary...."></textarea>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer d-flex justify-content-around">
                                        <button class="btn btn-danger mr-4" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Cancel</button>
                                        <button type="submit" class="btn btn-primary" form="newAppointmentForm">Submit</button>
                                    </div>
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
                                        <th>Doctor</th>
                                        <th>Date & Time</th>
                                        <th>summary</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($appointments as $appointment)
                                    @if($appointment->action == 'approved')
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>Dr. {{$appointment->getDoctor()->getFullname()}}</td>
                                        <td>{{date('M d, Y H:m A',strtotime("$appointment->date $appointment->time"))}}</td>
                                        <td>{{ucfirst($appointment->summary)}}</td>
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
                                    <h6 class="text-secondary">Requested Appointments</h6>
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
                                            <th>Doctor</th>
                                            <th>Date & Time</th>
                                            <th>summary</th>
                                            <th>status</th>
                                            <th>action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($appointments as $appointment)
                                        @if($appointment->action != 'approved')
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>Dr. {{$appointment->getDoctor()->getFullname()}}</td>
                                            <td>{{date('M d, Y H:m A',strtotime("$appointment->date $appointment->time"))}}</td>
                                            <td>{{ucfirst($appointment->summary)}}</td>
                                            <td>
                                                @if($appointment->action ==     'noaction')
                                                <span class="badge badge-warning" type="submit">Pending</span>
                                                @elseif($appointment->action == 'rejected')
                                                <span class="badge badge-secondary" type="submit">Rejected</span>
                                                @elseif($appointment->action == 'canceled')
                                                <span class="badge badge-danger" type="submit">Cancelled</span>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                <div class="reject">
                                                @if($appointment->action != 'noaction' && $appointment->action != 'approved')
                                                    <button class="btn btn-danger py-0 px-2" type="submit" data-toggle="modal" data-target="#clearApptReq-{{$appointment->id}}">Clear</button>
                                                    <div class="modal fade" id="clearApptReq-{{$appointment->id}}" tabindex="-1" role="dialog" aria-labelledby="clearApptReq-{{$appointment->id}}Label" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="clearApptReq-{{$appointment->id}}Label">Confirm Clearing Appointment Request</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form method="post" id="clearApptReq-{{$appointment->id}}Form" action="{{route('patient.appointment.clear')}}">
                                                                        @csrf
                                                                        <input type="hidden" name="appointment_id" value="{{$appointment->id}}">
                                                                        <div class="text-center">
                                                                            <h3>Are You Sure?</h3>
                                                                            <h6>You want to clear this request</h6>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                                <div class="modal-footer d-flex justify-content-around">
                                                                    <button class="btn mr-4" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Cancel</button>
                                                                    <button type="submit" class="btn btn-danger" form="clearApptReq-{{$appointment->id}}Form">Yes, Clear</button>
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
                </div>
            </div>                    
        </div>

    </div>
</div>

@endsection