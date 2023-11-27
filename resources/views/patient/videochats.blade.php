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
                                    <h3>Video Conference</h3>
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
                                    <!-- <h3>Video Conference</h3> -->
                                    <p class="meta-date">Choose a Patient to start call</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="widget-content">
                        <div class="row">
                            <div class="col-8">
                                <form action="" method="post">
                                    <div class="form-row mb-4">
                                        <div class="form-group col-md-6">
                                            <p class="mb-0">You have an ongoing call with Dr. Fatima Isah</p>
                                        </div>
                                    </div>
                                    <div class="form-row mb-4">
                                        <button type="submit" class="btn btn-primary">Join Call</button>
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