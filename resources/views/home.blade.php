@extends('layouts.home')

@section('content')
<!--  BEGIN MAIN CONTAINER  -->
<div class="mx-auto mt-4">
    <div class="overlay"></div>
    <div class="search-overlay"></div>
    <!--  BEGIN CONTENT AREA  -->
    <div class="">
        <div class="p-0 m-0 col-12">
            <div class="img-fluid" style="background-image: url({{asset('storage/images/ashmed-main.jpg')}}); height: 92.5vh">
                <span class="mask bg-gradient-dark opacity-6"></span>
                <div class="d-flex align-items-center" style="height: 100%">
                    <div class="col-12">
                        <div class="d-flex flex-column justify-content-center align-items-center mb-5">
                            <h1 class="display-3 mb-4 ps-1" style="font-family: comic sans MS; color: white">Welcome To</h1>
                            <h1 class="fs-5rem" style="font-weight: 900; font-family: georgia; color: white">Ashmed Telemedicine Portal</h1>
                        </div>
                        <div class="d-flex flex-column justify-content-center align-items-center">
                            <div class=" mb-5">
                                <p class="badge badge-danger" style="font-style: italic; font-size: 1rem; font-weight: 900; font-family: comic sans MS; color: white">
                                An interactive interface for seamless Doctor-Patient Virtual Medical Consultation and Theraphy Session</p>
                            </div>
                            <div class="">
                                <a href="/login" class="btn btn-primary btn-lg w-30">Start Session Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--  END CONTENT AREA  -->
</div>
<!-- END MAIN CONTAINER -->
@endsection
