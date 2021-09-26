<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, shrink-to-fit=no">
    {{-- CSRF Token--}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{--  Page Title  --}}
    <title> Routine Management | @yield('page_title') </title>

    {{-- <link rel="stylesheet" href="{{ asset('css/app.css') }}"> --}}


    @include('layouts.admin.partials.stylesheet')
</head>

<body>
    <div class="app" id="app">
        <admin-layout />
    </div>

    {{-- Sweet Alert --}}
    {{-- @include('sweetalert::alert') --}}


    @include('layouts.admin.partials.scripts')

    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
