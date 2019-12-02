<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/15.0.0/classic/ckeditor.js"></script> 
    <script src="https://kit.fontawesome.com/0caf2b0443.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    {{-- <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js"></script> --}}
    
    <script src="{{ asset('js/midnight.jquery.min.js') }}"></script>
    <script>
        // Start midnight
        jQuery(document).ready(function($){
            // Change this to the correct selector.
            $('.midnight').midnight();
        });
        </script>
    
    <!-- Fonts -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    {{-- 1 Inclure HEADER --}}
        
    <header>
        <div class="midnight">
            <div id="logo">
            </div>
            </div>
            <ion-icon id="burgerButton" name="menu"></ion-icon>
            <div id="menuFull">
                <nav>
                    <ul>
                        <a href="{{ route('home') }}"><li>Accueil</li></a>
                        <a href="{{ route('articles') }}"><li>Articles</li></a>
                        <a href="{{ route('portfolio') }}"><li>Portfolio</li></a>
                        <a href="{{ route('portfolio') }}"><li>Contact</li></a>
                        @guest
                        <a class="nav-link" href="{{ route('login') }}"><li>{{ __('Se connecter') }}</li></a>
                            @if (Route::has('register'))
                                
                                    <a class="nav-link" href="{{ route('register') }}"><li class="nav-item">{{ __('S\'inscrire') }} </li></a>
                               
                            @endif
                            @else
                                <a href="{{ route('profil', auth::user()->id)}}"><li>Mon profil</li></a>
    
                                    <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();"><li>
                                        {{ __('Logout') }}
                                    </li></a>
                                
                                
    
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </nav>
            </div>
            <nav class="menu">
                <ul>
                        <a href="{{ route('home') }}"><li class="na-item">Accueil</li></a>
                        <a href="{{ route('articles') }}"><li>Articles</li></a>
                        <a href="{{ route('portfolio') }}"><li class="na-item">Portfolio</li></a>
                        <a href="{{ route('login') }}"><li class="na-item">Contact</li></a>
                </ul>
            </nav>
        </header>
        <aside>
            <ion-icon id="closeButton" name="close-circle"></ion-icon>
            <div id="clear"></div>
            <nav>
                <ul>
                    <a href="{{ route('home') }}"><li>Accueil</li></a>
                    <a href="{{ route('articles') }}"> <li>Articles</li></a>
                    <a href="{{ route('home') }}"><li>Portfolio</li></a>
                    <a href="{{ route('home') }}"><li>Contact</li></a>
                    @guest
                    <a class="nav-link" href="{{ route('login') }}"><li>{{ __('Se connecter') }}</li></a>
                        @if (Route::has('register'))
                            
                                <a class="nav-link" href="{{ route('register') }}"><li class="nav-item">{{ __('S\'inscrire') }}</li></a>
                            
                        @endif
                        @else
                            <li><a href="{{ route('profil', auth::user()->id)}}">Mon profil</a></li>

                                <li><a href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a></li>
                            
                            

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </nav>
        </aside>
        {{-- <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Blog') }}
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
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('portfolio') }}">{{ __('Portfolio') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('articles') }}">{{ __('Articles') }}</a>
                            </li> --}}

                        {{-- @guest
                            
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Se connecter') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('S\'inscrire') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
                                
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                                    <a class="dropdown-item" href="{{ route('profil', auth::user()->id)}}">Mon profil</a>

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
        </nav> --}}
    <div>
        <main>
            @yield('content')
        </main>
    </div>
</body>
@yield("javascript")
{{-- <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
<script>
    tinymce.init({
        selector:'textarea#ckedit',
        width: 900,
        height: 300
    });
</script> --}}
{{-- 
<script>
    let ckedit = document.querySelector("#ckedit");
    if(ckedit){
        ClassicEditor
            .create(ckedit)
            .catch(error => {
                console.error(error);
            });
    }
</script>  --}}
</html>
