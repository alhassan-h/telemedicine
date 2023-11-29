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
                                                        <div class="dropify-wrapper has-preview"><div class="dropify-message"><span class="file-icon"></span> <p>Click to Upload or Drag n Drop</p><p class="dropify-error">Ooops, something wrong appended.</p></div><div class="dropify-loader" style="display: none;"></div><div class="dropify-errors-container"><ul></ul></div><input type="file" id="input-file-max-fs" class="dropify" data-default-file="../uploads/images/student/no_profile.jpeg" data-max-file-size="2M" name="profile"><button type="button" class="dropify-clear"><i class="flaticon-close-fill"></i></button><div class="dropify-preview" style="display: block;"><span class="dropify-render"><img src="../uploads/images/student/no_profile.jpeg"></span><div class="dropify-infos"><div class="dropify-infos-inner"><p class="dropify-filename"><span class="file-icon"></span> <span class="dropify-filename-inner">no_profile.jpeg</span></p><p class="dropify-infos-message">Upload or Drag n Drop</p></div></div></div></div>
                                                        <p class="mt-2 pl-3">U21CS1001</p>
                                                    </div>
                                                </div>
                                                <div class="col-xl-10 col-lg-12 col-md-8 mt-md-0 mt-4">
                                                    <div class="form">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="fname">First Name</label>
                                                                    <input type="text" class="form-control mb-4" id="fname" placeholder="First Name" value="Alhassan" name="fname">
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
                                                                    <input type="text" class="form-control mb-4" id="lname" placeholder="Last Name" value="Hassan" name="lname">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <label class="dob-input">Date of Birth</label>
                                                                <input type="date" class="form-control mb-4" id="dob" value="0000-00-00" name="dob">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="sex">Sex</label>
                                                                    <select class="form-control mb-4" id="sex" name="sex">
                                                                        <option value="f">F</option>
                                                                        <option value="m" selected="">M</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="state">State</label>
                                                                    <input type="text" class="form-control mb-4" id="state" placeholder="State" value="Kaduna" name="state">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="email">Email</label>
                                                                    <input type="text" class="form-control mb-4" id="email" placeholder="Email" value="alhassanh88@gmail.com" name="email">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="phone">Phone Number</label>
                                                                    <input type="text" class="form-control mb-4" id="phone" placeholder="Phone Number" value="09012345678" name="phone">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="programme">Department</label>
                                                                    <input type="text" class="form-control mb-4" id="programme" placeholder="Department" value="Computer Science" name="programme" disabled="">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="level">Level</label>
                                                                    <input type="text" class="form-control mb-4" id="level" placeholder="Level" value="100" name="level" disabled="">
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