<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <!-- Scripts -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    {{-- isotope --}}
    <script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.min.js"></script>
    <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/15.0.0/classic/ckeditor.js"></script> 
    <script src="https://kit.fontawesome.com/0caf2b0443.js" crossorigin="anonymous"></script>
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
            //ISOTOPE
        jQuery(function($){
            $('.grid').isotope({filter: '*'});
            $('.filter-button-group').on( 'click', 'button', function() {
                var filterValue = $(this).attr('data-filter');
                $('.grid').isotope({ filter: filterValue });
            });
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
                            <a href="{{ route('profil', auth::user()->id)}}"><li>Mon profil</li></a>

                                <a href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                        <li>{{ __('Logout') }}</li>
                                </a>
                            
                            

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </nav>
        </aside>
        
    <div>
        <main>
            @yield('content')
        </main>
    </div>
</body>
<script src="{{ asset('js/app.js') }}" defer></script>
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
