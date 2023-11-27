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
                                <h3>Doctors Management</h3>
                                <p class="meta-date"></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="widget-content">
                    <button type="button" class="btn btn-primary mb-2 mr-2" data-toggle="modal" data-target="#filterStudents">New Doctor</button>
                    <div class="modal fade" id="filterStudents" tabindex="-1" role="dialog" aria-labelledby="filterStudentsLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="filterStudentsLabel">Add New Doctor</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form id="addDoctorForm" class="text-left" method="POST" action="{{route('admin.doctors.save')}}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form">
                                            <div class="form-row mb-1">
                                                <div class="form-group col-md-6 mb-1">
                                                    <label for="first_name" class="mb-0">First Name</label>
                                                    <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{old('first_name')}}" required autocomplete="first_name" autofocus placeholder="First Name">

                                                    @error('first_name')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group col-md-6 mb-1">
                                                    <label for="last_name" class="mb-0">Last Name</label>
                                                    <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{old('last_name')}}" required autocomplete="last_name" placeholder="Last Name">

                                                    @error('last_name')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-row mb-1">
                                                <div class="form-group col-md-6 mb-1">
                                                    <label for="gender" class="mb-0">Gender</label>
                                                    <select id="gender" class="form-control @error('gender') is-invalid @enderror" name="gender" required>
                                                        <option value="male" @selected(old('gender') == 'male')>Male</option>
                                                        <option value="female" @selected(old('gender') == 'female')>Female</option>
                                                    </select>

                                                    @error('gender')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group col-md-6 mb-1">
                                                    <label for="phone" class="mb-0">Phone Number</label>
                                                    <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{old('phone')}}" required autocomplete="phone" placeholder="Phone Number">
                                                    
                                                    @error('phone')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            
                                            <div class="form-row mb-1">
                                                <div class="form-group col-12 mb-1">
                                                    <label for="email" class="mb-0">Email</label>
                                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{old('email')}}" required autocomplete="email" placeholder="Email Address">
                                                    
                                                    @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                           
                                            <div class="form-row mb-1">
                                                <div class="form-group col-12 mb-1">
                                                    <label for="specialization" class="mb-0">Specialization</label>
                                                    <input id="specialization" type="text" class="form-control @error('specialization') is-invalid @enderror" name="specialization" value="{{old('specialization')}}" required autocomplete="specialization" placeholder="Specialization">
                                                    
                                                    @error('specialization')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-row mb-1">
                                                <div class="form-group col-12 mb-1">
                                                    <label for="password" class="mb-0">Password</label>
                                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">
                                                    
                                                    @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            {{--
                                                <div class="form-row mb-1">
                                                    <div class="form-group col-12 mb-1">
                                                        <label for="profile" class="mb-0">Profile</label>
                                                        <input id="profile" type="file" class="form-control @error('profile') is-invalid @enderror" name="profile" required autocomplete="profile">

                                                        @error('profile')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            --}}
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer d-flex justify-content-around">
                                    <button class="btn btn-danger" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Cancel</button>
                                    <button type="submit" class="btn btn-primary" form="addDoctorForm">Add Doctor</button>
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
                                <h6 class="text-secondary">Manage Doctors</h6>
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
                                        <a class="btn btn-warning mb-sm-1 mr-sm-1" data-toggle="modal" data-target="#viewDoctor-{{$doctor->id}}">Update</a>
                                        <div class="modal fade" id="viewDoctor-{{$doctor->id}}" tabindex="-1" role="dialog" aria-labelledby="viewDoctor-{{$doctor->id}}Label" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="viewDoctor-{{$doctor->id}}Label">View Doctor</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form id="addDoctorForm-{{$doctor->id}}" class="text-left" method="POST" action="{{route('admin.doctors.update')}}" enctype="multipart/form-data">
                                                            @csrf
                                                            <input type="hidden" name="doctor_id" value="{{$doctor->id}}">
                                                            <div class="form">
                                                                <div class="form-row mb-1">
                                                                    <div class="form-group col-md-6 mb-1">
                                                                        <label for="first_name" class="mb-0">First Name</label>
                                                                        <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{old('first_name', $doctor->getFirstName())}}" required autocomplete="first_name" autofocus placeholder="First Name">

                                                                        @error('first_name')
                                                                            <span class="invalid-feedback" role="alert">
                                                                                <strong>{{ $message }}</strong>
                                                                            </span>
                                                                        @enderror
                                                                    </div>
                                                                    <div class="form-group col-md-6 mb-1">
                                                                        <label for="last_name" class="mb-0">Last Name</label>
                                                                        <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{old('last_name', $doctor->getLastName())}}" required autocomplete="last_name" placeholder="Last Name">

                                                                        @error('last_name')
                                                                            <span class="invalid-feedback" role="alert">
                                                                                <strong>{{ $message }}</strong>
                                                                            </span>
                                                                        @enderror
                                                                    </div>
                                                                </div>

                                                                <div class="form-row mb-1">
                                                                    <div class="form-group col-md-6 mb-1">
                                                                        <label for="gender" class="mb-0">Gender</label>
                                                                        <select id="gender" class="form-control @error('gender') is-invalid @enderror" name="gender" required>
                                                                            <option value="male" @selected(old('gender') == 'male' || $doctor->getGender() == 'male')>Male</option>
                                                                            <option value="female" @selected(old('gender') == 'female' || $doctor->getGender() == 'female')>Female</option>
                                                                        </select>

                                                                        @error('gender')
                                                                            <span class="invalid-feedback" role="alert">
                                                                                <strong>{{ $message }}</strong>
                                                                            </span>
                                                                        @enderror
                                                                    </div>
                                                                    <div class="form-group col-md-6 mb-1">
                                                                        <label for="phone" class="mb-0">Phone Number</label>
                                                                        <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{old('phone', $doctor->getPhone())}}" required autocomplete="phone" placeholder="Phone Number">
                                                                        
                                                                        @error('phone')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                                
                                                                <div class="form-row mb-1">
                                                                    <div class="form-group col-12 mb-1">
                                                                        <label for="email" class="mb-0">Email</label>
                                                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{old('email', $doctor->getEmail())}}" required autocomplete="email" placeholder="Email Address">
                                                                        
                                                                        @error('email')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                            
                                                                <div class="form-row mb-1">
                                                                    <div class="form-group col-12 mb-1">
                                                                        <label for="specialization" class="mb-0">Specialization</label>
                                                                        <input id="specialization" type="text" class="form-control @error('specialization') is-invalid @enderror" name="specialization" value="{{old('specialization', $doctor->getSpecialization())}}" required autocomplete="specialization" placeholder="Specialization">
                                                                        
                                                                        @error('specialization')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                                <div class="form-row mb-1">
                                                                    <div class="form-group col-12 mb-1">
                                                                        <label for="password" class="mb-0">Password</label>
                                                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">
                                                                        
                                                                        @error('password')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                                {{--
                                                                    <div class="form-row mb-1">
                                                                        <div class="form-group col-12 mb-1">
                                                                            <label for="profile" class="mb-0">Profile</label>
                                                                            <input id="profile" type="file" class="form-control @error('profile') is-invalid @enderror" name="profile" required autocomplete="profile">

                                                                            @error('profile')
                                                                                <span class="invalid-feedback" role="alert">
                                                                                    <strong>{{ $message }}</strong>
                                                                                </span>
                                                                            @enderror
                                                                        </div>
                                                                    </div>
                                                                --}}
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <div class="modal-footer d-flex justify-content-around">
                                                        <button class="btn btn-danger" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Cancel</button>
                                                        <button type="submit" class="btn btn-warning" form="addDoctorForm-{{$doctor->id}}">Update</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <a class="btn btn-danger" data-toggle="modal" data-target="#deleteDoctor-{{$doctor->id}}">Delete</a>
                                        <div class="modal fade" id="deleteDoctor-{{$doctor->id}}" tabindex="-1" role="dialog" aria-labelledby="deleteDoctor-{{$doctor->id}}Label" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="deleteDoctor-{{$doctor->id}}Label">Confirm Doctor Deletion</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="text-center">
                                                            <h3>Are You Sure?</h3>
                                                            <h6>You want to delete this doctor</h6>
                                                            <p class="mb-0 text-secondary">Dr. {{$doctor->getFullname()}}</p>
                                                        </div>
                                                        <form id="deleteDoctorForm-{{$doctor->id}}" class="text-left" method="POST" action="{{route('admin.doctors.delete')}}">
                                                            @csrf
                                                            <input type="hidden" name="doctor_id" value="{{$doctor->id}}">
                                                        </form>
                                                    </div>
                                                    <div class="modal-footer d-flex justify-content-around">
                                                        <button class="btn btn-grey" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Cancel</button>
                                                        <button type="submit" class="btn btn-danger" form="deleteDoctorForm-{{$doctor->id}}">Yes, Delete</button>
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