<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">

        <img class="navbar-brand" src="{{asset('img/logomono.png')}}" style="width:7%">

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
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            @if(Auth::user()->rol_id === 1)
                                <a href="{{ url('/home') }}" class=" dropdown-item text-sm text-gray-700 underline">
                                    Tickets
                                </a>
                                <a href="{{ url('/user') }}" class=" dropdown-item text-sm text-gray-700 underline">
                                    Gestion Usuarios
                                </a>
                                <a href="{{ url('/invoice') }}" class=" dropdown-item text-sm text-gray-700 underline">
                                    Gestion Facturas
                                </a>


                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                            @else
                            <a href="{{ url('/home') }}" class=" dropdown-item text-sm text-gray-700 underline">
                                Tickets
                            </a>
                            <a href="{{ url('/invoice') }}" class=" dropdown-item text-sm text-gray-700 underline">
                                Mis Facturas
                            </a>
                            {{-- Logout --}}
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            
                            @endif

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>

                        </div>
                        
                    </li>

                @endguest
            </ul>
        </div>
    </div>
</nav>