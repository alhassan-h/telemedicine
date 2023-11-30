@extends('layouts.dash')

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
                                <h3 class="text-primary">Patients Management</h3>
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
                                <h6 class="text-secondary">Manage Patients</h6>
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
                                    <th>full name</th>
                                    <th>sex</th>
                                    <th>contact</th>
                                    <th>profile</th>
                                    <th>action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data['patients'] as $patient)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{ucwords($patient->getFullname())}}</td>
                                    <td>{{ucwords($patient->getGender())}}</td>
                                    <td>
                                        <p class="mb-1 p-0">{{ucwords($patient->getPhone())}}</p>
                                        <span>{{strtolower($patient->getEmail())}}</span>
                                    </td>
                                    <td>@php($profile = $patient->getProfilePicture())
                                        <img class="profile-pic" src='{{asset("storage/images/users/$profile")}}'>
                                    </td>
                                    <td class="d-flex justify-content-around">
                                        <a class="btn btn-danger" data-toggle="modal" data-target="#deletePatient-{{$patient->id}}">Delete</a>
                                        <div class="modal fade" id="deletePatient-{{$patient->id}}" tabindex="-1" role="dialog" aria-labelledby="deletePatient-{{$patient->id}}Label" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="deletePatient-{{$patient->id}}Label">Confirm Patient Deletion</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="text-center">
                                                            <h3>Are You Sure?</h3>
                                                            <h6>You want to delete this patient</h6>
                                                            <p class="mb-0 text-secondary">{{$patient->getFullname()}}</p>
                                                        </div>
                                                        <form id="deletePatientForm-{{$patient->id}}" class="text-left" method="POST" action="{{route('admin.patients.delete')}}">
                                                            @csrf
                                                            <input type="hidden" name="patient_id" value="{{$patient->id}}">
                                                        </form>
                                                    </div>
                                                    <div class="modal-footer d-flex justify-content-around">
                                                        <button class="btn btn-grey" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Cancel</button>
                                                        <button type="submit" class="btn btn-danger" form="deletePatientForm-{{$patient->id}}">Yes, Delete</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
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