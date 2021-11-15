<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Cobranza') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    @include('layouts.css')
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd;">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            @guest
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Cobranza') }}
            </a>
            @else
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Cobranza') }}
            </a>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                    @if(auth()->user()->is_admin)
                      <li class="nav-item {{ ! Route::is('home') ?: 'active' }}">
                          <a class="nav-link" href="{{ route('home') }}">Inicio</a>
                      </li>
                      <li class="nav-item {{ ! Route::is('users.index') ?: 'active' }}">
                          <a class="nav-link" href="{{ route('users.index') }}">Clientes</a>
                      </li>
                      <li class="nav-item" {{ ! Route::is('payments.index') ?: 'active' }}>
                          <a class="nav-link" href="{{ route('payments.index') }}">Ruta</a>
                      </li>
                      <li class="nav-item {{ ! Route::is('sectors.index') ?: 'active' }}">
                          <a class="nav-link" href="{{ route('sectors.index') }}">Sectores</a>
                      </li>
                      <li class="nav-item {{ ! Route::is('loans.index') ?: 'active' }}">
                          <a class="nav-link" href="{{ route('loans.index') }}">Préstamos</a>
                      </li>
                      <li class="nav-item {{ ! Route::is('roles.index') ?: 'active' }}">
                        <a class="nav-link" href="{{ route('roles.index') }}">Usuarios</a>
                    </li>
                    {{-- @else
                        <li class="nav-item {{ ! Route::is('client.index') ?: 'active' }}">
                            <a class="nav-link" href="{{ route('client.index') }}">Inicio</a>
                        </li> --}}
                    @endif
              </ul>
              <div class="btn-group">
                  {{--@guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                @else--}}
                    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="float: right">
                        {{ Auth::user()->getUsername() }}
                    </button>
                    <div class="dropdown-menu dropdown-menu-right">
                        <form action="/logout" method="post" style="display: inline">
                            @csrf
                            <a class="dropdown-item" href="#" onclick="this.closest('form').submit()">{{ __('Logout') }}</a>
                        </form>

                        {{-- <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form> --}}
                    </div>
                {{--@endguest--}}
              </div>
            @endguest
            </div>
          </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
   @include('layouts.scripts')
</body>
</html>
