@extends('layouts.dash')

@php($patient = $data['patient'])

@section('content')
<div id="content" class="main-content">
    <div class="layout-px-spacing">  
        <div class="account-settings-container layout-top-spacing">

        <div class="account-content">
                <div class="scrollspy-example" data-spy="scroll" data-target="#account-settings-scroll" data-offset="-100">
                    <div class="row mb-5">
                        <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                            <form id="editProfileForm" action={{route('doctor.profile.update')}} class="section general-info" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="info">
                                    <h6 class="">Profile Information</h6>
                                    <div class="row">
                                        <div class="col-lg-11 mx-auto">
                                            <div class="row">
                                                <div class="col-xl-2 col-lg-12 col-md-4">
                                                    <div class="upload mt-4 pr-md-4">
                                                        @php($profile = $patient->getProfilePicture())
                                                        <input type="file" id="input-file-max-fs" class="dropify" data-default-file='{{asset("storage/images/users/$profile")}}' data-max-file-size="2M" name="profile" />
                                                        <p class="mt-2 pl-3">Dr. {{$patient->getFullname()}}</p>
                                                    </div>
                                                </div>
                                                <div class="col-xl-10 col-lg-12 col-md-8 mt-md-0 mt-4">
                                                    <div class="form">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="fname">First Name</label>
                                                                    <input type="text" class="form-control mb-4" id="fname" placeholder="First Name" value="{{$patient->getFirstName()}}" name="first_name">
                                                                    @error('first_name')
                                                                        <span class="d-flex invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="lname">Last Name</label>
                                                                    <input type="text" class="form-control mb-4" id="lname" placeholder="Last Name" value="{{$patient->getFirstName()}}" name="last_name">
                                                                    @error('last_name')
                                                                        <span class="d-flex invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="gender">Gender</label>
                                                                    <select class="form-control mb-4" id="sex" name="gender">
                                                                        <option value="female" @selected($patient->getGender() == 'female')>Female</option>
                                                                        <option value="male" @selected($patient->getGender() == 'male')>Male</option>
                                                                    </select>
                                                                    @error('gender')
                                                                        <span class="d-flex invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <label class="phone-input">Phone Number</label>
                                                                <input type="text" class="form-control mb-4" placeholder=" Phone Number" id="phone" value="{{$patient->getPhone()}}" name="phone">
                                                                @error('phone')
                                                                    <span class="d-flex invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="email">Email</label>
                                                                    <input type="text" class="form-control mb-4" id="email" placeholder="Email" value="{{$patient->getEMail()}}" name="email" disabled>
                                                                </div>
                                                            </div>                       
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="password">New Password</label>
                                                                    <input type="text" class="form-control mb-4" id="password" placeholder=" Password" value="" name="password">
                                                                    @error('password')
                                                                        <span class="d-flex invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                                            </div>                             
                                                        </div>
                                                    </div>
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

            <div class="account-settings-footer">
                <div class="as-footer-container">
                    <button type="submit" class="btn btn-primary" form="editProfileForm">Save Changes</button>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection