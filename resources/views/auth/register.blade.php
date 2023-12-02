@extends('layouts.auth')

@section('content')
<div class="layout-px-spacing d-flex justify-content-center align-items-center">
    <div class="col-lg-8 col-md-12 col-sm-12 col-12">
        <div class="">
            <div class="form-container outer">
                <div class="form-form">
                    <div class="">
                        <div class="form-container">
                            <div class="form-content">

                                <div class="form-content-heading d-flex mb-4">
                                    <img src="{{asset('storage/images/ashmed-logo.png')}}" class="auth-logo">
                                    <div class="text-center full-width">
                                        <h1 class="">Create An Account</h1>
                                        <!-- <p class="">Log in to your account to continue.</p> -->
                                    </div>
                                </div>

                                <div class="full-width error-log-pane text-left mb-2">
                                
                                </div>
                                
                                <form class="text-left" method="POST" action="{{route('register')}}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form">
                                        <div class="form-row mb-1">
                                            <div class="form-group col-md-6 mb-1">
                                                <label for="first_name" class="mb-0">First Name</label>
                                                <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" required autocomplete="first_name" autofocus placeholder="First Name">

                                                @error('first_name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-6 mb-1">
                                                <label for="last_name" class="mb-0">Last Name</label>
                                                <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name" placeholder="Last Name">

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
                                                <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" placeholder="Phone Number">
                                                
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
                                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email Address">
                                                
                                                @error('email')
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
                                        <div class="mt-3 mb-3">
                                            <button type="submit" class="btn btn-primary btn-lg btn-block" value="">Register</button>
                                        </div>
                                        <p class="signup-link">Already registered? <a href="{{route('login')}}">Log In</a></p>
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
