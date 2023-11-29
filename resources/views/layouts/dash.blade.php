@php( $page_name = $data['page_name'])
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{csrf_token()}}">
    
    <title>Ashmed</title>
    <link rel="icon" type="image/x-icon" href="{{asset('storage/images/favicon.ico')}}"/>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    
    @include('inc.styles')
</head>
<body>
    <!-- BEGIN LOADER -->
    <div id="load_screen"> <div class="loader"> <div class="loader-content">
        <div class="spinner-grow align-self-center"></div>
    </div></div></div>
    <!--  END LOADER -->

    <!--  BEGIN NAVBAR  -->
    @include('inc.navbar')
    <!--  END NAVBAR  -->

    <!--  BEGIN MAIN CONTAINER  -->
    <div class="main-container" id="container">
        <div class="overlay"></div>
        <div class="search-overlay"></div>
        <!--  BEGIN SIDEBAR  -->
        @include('inc.sidebar')
        <!--  END SIDEBAR  -->

        <!--  BEGIN CONTENT AREA  -->
        @yield('content')
        <!--  END CONTENT AREA  -->
    </div>
    <!-- END MAIN CONTAINER -->

    <!-- BEGIN SCRIPTS -->
    @include('inc.scripts')
    <!-- END SCRIPTS -->

</body>
</html>