<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'SumberRejeki') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

     <link rel="stylesheet" type="text/css" href=" https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">

    @yield('styles')
</head>
<body>
    @include('shared.navbar')

    <div class="container my-4">
        <div class="row">
            <div class="col-lg-2">
                @include('shared.kiri')
            </div>
            <div class="col-lg-8">
               @yield('content') 
            </div>
            <div class="col-lg-2">
                @include('shared.kanan')
            </div>
        </div>
    </div>

    


    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

    <script>
        
        @if(Session::has('success'))
        toastr.success('{{  Session::get('success') }}');
        @endif

        @if(Session::has('info'))
        toastr.info('{{  Session::get('info') }}');
        @endif

    </script>
    
    @yield('scripts')

</body>
</html>
