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
                                <h3 class="text-dark">Patients</h3>
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
                                <h6 class="text-secondary">Available Patients</h6>
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
                                        <a href="{{route('doctor.chats').'/'.$patient->user_id}}" class="btn btn-primary">Chat</a>                                        
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