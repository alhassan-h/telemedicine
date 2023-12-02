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

                                <div class="form-content-heading d-flex">
                                    <img src="{{asset('storage/images/ashmed-logo.png')}}" class="auth-logo">
                                    <div class="text-center full-width">
                                        <h1 class="">Sign In</h1>
                                        <p class="">Log in to your account to continue.</p>
                                    </div>
                                </div>

                                <div class="full-width error-log-pane text-left mb-2">
                                
                                </div>
                                
                                <form class="text-left" method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="form">
                                        <div class="mb-4 mt-4">
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email Address" autofocus>

                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="mb-4">
                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">

                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class=" mb-3">
                                            <button type="submit" class="btn btn-primary btn-lg btn-block" value="">Log In</button>
                                        </div>
                                        <p class="signup-link">Not registered ? <a href="{{route('register')}}">Create an account</a></p>
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
