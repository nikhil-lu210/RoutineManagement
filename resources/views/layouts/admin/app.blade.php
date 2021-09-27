<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        {{-- Meta Starts --}}
        @include('layouts.admin.partials.metas')
        {{-- Meta Ends --}}

        {{--  Page Title  --}}
        <title> {{ __('Admin') }} | @yield('page_title') </title>
        <!-- Fevicon -->
        {{-- <link rel="shortcut icon" href="#" /> --}}

        <!-- Start css -->
        @include('layouts.admin.partials.stylesheet')
        <!-- End css -->
    </head>


    <body class="vertical-layout">
        <!-- Start Containerbar -->
        <div id="app">
            <admin-layout />
        </div>
        <!-- End Containerbar -->
        
        
        @include('sweetalert::alert')

        <!-- Start js -->
        @include('layouts.admin.partials.scripts')
        <!-- End js -->

        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
