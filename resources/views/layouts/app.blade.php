<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/inputfields.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap JS (optional, if you need Bootstrap JavaScript features) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</head>
<body class="bg-gray-100 font-sans antialiased">
<div id="app">

    @include('layouts.navbar')

    <div class="main flex flex-wrap justify-end mt-16">

        @include('layouts.sidebar')

        <div class="content w-full sm:w-5/6">
            <div class="container mx-auto p-4 sm:p-6">

                @yield('content')

            </div>
        </div>
    </div>
</div>

<script src="{{ asset('/js/app.js') }}"></script>

<script>
    $(function() {
        $( "#opennavdropdown" ).on( "click", function() {
            $( "#navdropdown" ).toggleClass( "hidden" );
        })
    })
</script>

@stack('scripts')

</body>
</html>
