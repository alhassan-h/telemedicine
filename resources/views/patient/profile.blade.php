@extends('layouts.dash')

@section('content')
<div id="content" class="main-content">
    <div class="layout-px-spacing">  
        <div class="account-settings-container layout-top-spacing">

            <div class="account-content">
                <div class="scrollspy-example" data-spy="scroll" data-target="#account-settings-scroll" data-offset="-100">
                    <div class="row mb-5">
                        <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                            <form id="editProfileForm" class="section general-info" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="action" value="editStudentProfile">
                                <div class="info">
                                    <h6 class="">Profile Information</h6>
                                    <div class="row">
                                        <div class="col-lg-11 mx-auto">
                                            <div class="row">
                                                <div class="col-xl-2 col-lg-12 col-md-4">
                                                    <div class="upload mt-4 pr-md-4">
                                                        <input type="file" id="input-file-max-fs" class="dropify" data-default-file="" data-max-file-size="2M" name="profile" />
                                                        <p class="mt-2 pl-3"></p>
                                                    </div>
                                                </div>
                                                <div class="col-xl-10 col-lg-12 col-md-8 mt-md-0 mt-4">
                                                    <div class="form">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="fname">First Name</label>
                                                                    <input type="text" class="form-control mb-4" id="fname" placeholder="First Name" value="" name="fname">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="mname">Middle Name</label>
                                                                    <input type="text" class="form-control mb-4" id="mname" placeholder=" Middle Name" value="" name="mname">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="lname">Last Name</label>
                                                                    <input type="text" class="form-control mb-4" id="lname" placeholder="Last Name" value="" name="lname">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <label class="dob-input">Date of Birth</label>
                                                                <input type="date" class="form-control mb-4" id="dob" value="" name="dob">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="sex">Sex</label>
                                                                    <select class="form-control mb-4" id="sex" name="sex">
                                                                        <option value="f">F</option>
                                                                        <option value="m">M</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="state">State</label>
                                                                    <input type="text" class="form-control mb-4" id="state" placeholder="State" value="" name="state">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="email">Email</label>
                                                                    <input type="text" class="form-control mb-4" id="email" placeholder="Email" value="" name="email">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="phone">Phone Number</label>
                                                                    <input type="text" class="form-control mb-4" id="phone" placeholder="Phone Number" value="" name="phone">
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