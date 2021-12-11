<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    
</head>
<body>
    <div id="app">

        <div class="logo">
            
            <a class="navbar-brand" href="{{ route('home') }}">
                <i class="fab fa-facebook"></i>
            </a>
        </div>
        <div class="centrale">
            <i class="fas fa-home"></i>
            <i class="fas fa-home"></i>
            <i class="fas fa-home"></i>
            <i class="fas fa-home"></i>
            <a class="navbar-brand" href="{{ route('users.index') }}">
                <i class="fas fa-search"></i>
            </a>
            
        </div>  
        
        <div class="destra">
          
   
            {{-- {{$friendRequest}} --}}
            @auth
            <ul class="lista-destra">
                <li>
                    
                    @if(Auth::user()->img_profile)
                        <a  href="{{ route('friend-request') }}">
                            <div title="Friends requests" class="friend-request">
                                {{$friendRequest}}  
                            </div>
                        </a>
                        <img class="img-profile" src="{{asset('storage/' . Auth::user()->img_profile)}}" alt="">
                        @else
                        <img class="no-img-profile" src="{{asset('images/placeholder.png')}}" alt="">
                    @endif
                </li>
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>
                    
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
    
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                {{-- </li><a href="friend-request-failed/{{ $request->id}}"> we</a> --}}
                <li>
                    <a href="{{ route('users.show', Auth::user()->id) }}">
                        <i class="fas fa-user"></i>
                    </a>  
                </li>
                <a href="{{ route('friends') }}">
                    <i class="fas fa-user"></i>
                </a> 
                {{-- <a href="{{ route('friends', Auth::user()->id) }}">
                    <i class="fas fa-user"></i>
                </a>  --}}
                <li><i class="fab fa-facebook-messenger"></i></li>
                <li><i class="fab fa-facebook-messenger"></i></li>
            </ul>
            @endauth

            @guest
                <h2>non loggato</h2>
            @endguest
           
        </div>
        <!-- Right Side Of Navbar -->
        
    </div>
        

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <script defer src="{{ mix('js/app.js') }}"></script>
</body>
</html>
