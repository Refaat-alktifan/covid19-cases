@php
$webInfo=\App\Settings::first();
@endphp
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>{{ config('app.name') }}</title>
    <!-- Favicon icon -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset($webInfo->favicon) }}">

    <!-- css here -->
    <link rel="stylesheet" href="{{ asset('admin/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/fontawesome-all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/fonts/flaticon/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/default.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/toastr.min.css') }}">
    @yield('style')

</head>

<body>

    <div class="loading"></div>

    @include('layouts.backend.partials.header')
    
    @include('layouts.backend.partials.sidebar')
    <div class="main-content-area">
        <div class="container-fluid">
            @yield('content')
        </div>
    </div>

    <!-- js here -->
    <script src="{{ asset('admin/js/vendor/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('admin/js/popper.min.js') }}"></script>
    <script src="{{ asset('admin/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('admin/js/sweetalert2.all.min.js') }}"></script>
    <script src="{{ asset('admin/js/main.js') }}"></script>
    <script src="{{ asset('admin/js/toastr.min.js') }}"></script>
    @yield('script')
     @if(Session::has('message'))
        <script>

          var type = "{{ Session::get('alert-type', 'info') }}";
          switch(type){
            case 'info':
            toastr.info("{{ Session::get('message') }}");
            break;

            case 'warning':
            toastr.warning("{{ Session::get('message') }}");
            break;

            case 'success':
            toastr.success("{{ Session::get('message') }}");
            break;

            case 'error':
            toastr.error("{{ Session::get('message') }}");
            break;
        }
    </script>
    @endif
</body>
</html>