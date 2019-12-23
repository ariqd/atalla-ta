<!DOCTYPE html>
<html
    class="js sizes customelements history pointerevents postmessage webgl websockets cssanimations csscolumns csscolumns-width csscolumns-span csscolumns-fill csscolumns-gap csscolumns-rule csscolumns-rulecolor csscolumns-rulestyle csscolumns-rulewidth csscolumns-breakbefore csscolumns-breakafter csscolumns-breakinside flexbox picture srcset webworkers"
    lang="en">

<head>
    <!-- Meta Tags -->
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="author" content="Ariq Daffa" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <!-- Page Title -->
    <title>Atalla | @yield('title', 'Home')</title>
    <!-- Favicon Icon -->
    <link rel="icon" href="{{ asset('assets') }}/img/favicon.png">
    <!-- Plugins css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/css/material-icons.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/css/jqvmap.min.css" />
    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/css/jquery-ui.css" /> --}}
    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/css/quill.snow.css" /> --}}
    @stack('css')
    <link id="mode-option" rel="stylesheet" type="text/css" href="{{ asset('assets') }}/css/style.css" />
</head>

<body>
    @include('layouts.header')
    @include('layouts.sidebar')
    @yield('content')
    <!-- Scripts -->
    <script src="{{ asset('assets') }}/js/vendor/modernizr-3.5.0.min.js"></script>
    <script src="{{ asset('assets') }}/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="{{ asset('assets') }}/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets') }}/js/bootstrap.min.js"></script>
    <script src="{{ asset('assets') }}/js/Chart.min.js"></script>
    <script src="{{ asset('assets') }}/js/chartjs.light.js"></script>
    @stack('js')
    <script src="{{ asset('assets') }}/js/smooth-scrollbar.js"></script>
    <script src="{{ asset('assets') }}/js/main.js"></script>
</body>

</html>
