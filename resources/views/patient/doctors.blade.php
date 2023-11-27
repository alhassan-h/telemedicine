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
                                    <h3>Ashmed Specialist Doctors</h3>
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
                                    <h6 class="text-secondary"></h6>
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
                                        <th>specialization</th>
                                        <th>profile</th>
                                        <th>action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($data['doctors'] as $doctor)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>Dr. {{ucwords($doctor->getFullname())}}</td>
                                        <td>{{ucwords($doctor->getGender())}}</td>
                                        <td>{{ucwords($doctor->getSpecialization())}}</td>
                                        <td>@php($profile = $doctor->getProfilePicture())
                                            <img class="profile-pic" src='{{asset("storage/images/users/$profile")}}'>
                                        </td>
                                        <td class="d-flex justify-content-around">
                                            <a href="{{route('patient.chats').'/'.$doctor->user_id}}" class="btn btn-primary">Chat</a>
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