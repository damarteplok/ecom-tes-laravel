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

    @yield('styles')
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'SumberRejeki') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item active">
                                <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
                                
                            </li>
                            <li class="nav-item">
                                <a  class="nav-link" href="/about">About</a>
                            </li>
                            <li class="nav-item">
                                <a  class="nav-link" href="/contact">Contact</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="container-fluid py-4">
            <div class="row">
                <div class="col-lg-2">
                    <ul class="nav flex-lg-column flex-row" style="list-style-type: none; ">
                        <li class="p-1 pl-5">
                          <a href="{{ route('home') }}">Dashboard</a>
                        </li>
                        <li class="p-1 pl-5">
                          <a data-toggle="collapse" href="#formsExamples1" aria-expanded="true" class="">Catalog</a>
                          <div class="collapse in" id="formsExamples1" aria-expanded="true" style="">
                              <ul >
                                <li><a href="{{ route('category.index') }}">Categories</a>
                                </li>
                                <li><a href="{{ route('subcategory.index') }}">SubCategories</a>
                                </li>
                                <li>
                                    <a href="{{ route('tag.index') }}">
                                    Tag
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('optional.index') }}">
                                    Optional
                                    </a>
                                </li>
                                <li><a href="{{ route('products.index') }}">Product</a>
                                </li>
                                
                                
                                                                                               
                              </ul>
                          </div>
                        </li>

                        <li class="p-1 pl-5">
                          <a data-toggle="collapse" href="#formsExamples2" aria-expanded="true" class="">Sales</a>
                          <div class="collapse in" id="formsExamples2" aria-expanded="true" style="">
                              <ul>
                                <li><a href="{{-- {{ route('tags') }} --}}">Orders</a>
                                </li>
                                                                                               
                              </ul>
                          </div>
                        </li>

                        <li class="p-1 pl-5">
                          <a data-toggle="collapse" href="#formsExamples3" aria-expanded="true" class="">Customers</a>
                          <div class="collapse in" id="formsExamples3" aria-expanded="true" style="">
                              <ul>
                                <li><a href="{{-- {{ route('tags') }} --}}">Member</a>
                                </li>

                                <li><a href="{{-- {{ route('tags') }} --}}">Groups</a>
                                </li>
                                                                                               
                              </ul>
                          </div>
                        </li>

                        <li class="p-1 pl-5">
                          <a href="{{-- {{ route('home') }} --}}">Report</a>
                        </li>
                    </ul>
                </div>

                <div class="col-lg-9">
                    @yield('content')
                </div>
            </div>
            
        </main>
    </div>


    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    @yield('scripts')

</body>
</html>