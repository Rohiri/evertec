<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <title>{{ config('app.name', 'Laravel') }}</title>
        <link rel="stylesheet" href="{{asset('build/css/bootstrap/dist/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('build/css/font-awesome.min.css')}}">
        <link rel="stylesheet" href="{{asset('build/css/ionicons.min.css')}}">
        <link rel="stylesheet" href="{{asset('build/css/daterangepicker.css')}}">
        <link rel="stylesheet" href="{{asset('build/css/datepicker.min.css')}}">
        <link rel="stylesheet" href="{{asset('build/css/iCheck/all.css')}}">
        <link rel="stylesheet" href="{{asset('build/css/colorpicker.min.css')}}">
        <link rel="stylesheet" href="{{asset('build/css/timepicker.min.css')}}">
        <link rel="stylesheet" href="{{asset('build/css/select2.min.css')}}">
        <link rel="stylesheet" href="{{asset('build/css/fullcalendar.min.css')}}">
        <link rel="stylesheet" href="{{asset('build/css/dataTables.bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('build/css/adminlte.min.css')}}">
        <link rel="stylesheet" href="{{asset('build/css/skins.min.css')}}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic">
        <style>
            .moneda {
                text-align: right;
            }
            hr{
                border-top-color: #3c8dbc;
            }
        </style>
        @livewireStyles
        <!-- Font Awesome -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
<!-- Ionicons -->
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    </head>
    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">

            @include('layouts.dashboard.header')
            @include('layouts.dashboard.sidebar')

            <div class="content-wrapper">
                @yield('content')
            </div>

            @include('layouts.dashboard.footer')
        </div>
        @livewireScripts
        <script src="{{asset('build/js/jquery.min.js')}}"></script>
        <script src="{{asset('build/css/bootstrap/dist/js/bootstrap.min.js')}}"></script>
        {{-- <script src="{{asset('build/js/Chart.min.js')}}"></script> --}}
        <script src="{{asset('build/js/dataTables.min.js')}}"></script>
        <script src="{{asset('build/js/dataTables.bootstrap.min.js')}}"></script>
        <script src="{{asset('build/js/select2.full.min.js')}}"></script>
        <script src="{{asset('build/js/inputmask.js')}}"></script>
        <script src="{{asset('build/js/inputmask.date.extensions.js')}}"></script>
        <script src="{{asset('build/js/inputmask.extensions.js')}}"></script>
        <script src="{{asset('build/js/moment.min.js')}}"></script>
        <script src="{{asset('build/js/daterangepicker.min.js')}}"></script>
        <script src="{{asset('build/js/datepicker.min.js')}}"></script>
        <script src="{{asset('build/js/colorpicker.min.js')}}"></script>
        <script src="{{asset('build/js/timepicker.min.js')}}"></script>
        <script src="{{asset('build/js/slimscroll.min.js')}}"></script>
        <script src="{{asset('build/js/icheck.min.js')}}"></script>
        <script src="{{asset('build/js/fullcalendar.js')}}"></script>
        <script src="{{asset('build/js/fastclick.js')}}"></script>
        <script src="{{asset('build/js/adminlte.min.js')}}"></script>
        <script src="{{asset('build/js/Chart.min.js')}}"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/numeral.js/2.0.6/numeral.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
        
        @yield('scripts')
    </body>
</html>