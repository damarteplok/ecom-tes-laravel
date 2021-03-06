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
                @if(Auth::guard('customer')->check())

                {{ Auth::shouldUse('customer') }}

                    <li class="nav-item active">
                        <a href="{{ route('index') }}" class="nav-link"></a>
                    </li>

                    
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('cart') }}">Basket</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('customer.checkout') }}">Checkout</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('payment.confirm') }}">Payment Confirmation</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{-- {{ route('register') }} --}}">{{ Auth::user()->name }}</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                        </a>
                         <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                    </li>

                   {{--  <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                             <span class="caret"></span>
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
                    </li> --}}

                @else

                    <li class="nav-item active">
                        <a href="{{ route('index') }}" class="nav-link">Home</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('payment.confirm') }}">Payment Confirmation</a>
                    </li>

                    
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('customer.login') }}">{{ __('Login') }}</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('regis.customer') }}">{{ __('Register') }}</a>
                    </li>

                    
                @endif

            </ul>
        </div>
    </div>
</nav>