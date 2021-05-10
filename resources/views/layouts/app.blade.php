<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- <title>{{ config('app.name', 'Demo') }}</title>
    <script src="../../js/jquery-1.11.2.min.js"></script>
    <script src="../../js/jquery-2.1.0.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script> -->
    <!-- Cdn de booststrap -->

    <link rel="stylesheet" type="text/css" href="{{asset('css/app.css')}}"> <!-- enlace para trabajar con vue -->

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <script src="{{ asset('js/app.js') }}" defer></script> 
    <!-- Scripts Trae los iconos -->   
    <!-- <script src="https://kit.fontawesome.com/61c48dd2ed.js" crossorigin="anonymous"></script> -->
    
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">    
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    

    
    <link href="{{ asset('css/styleper.css') }}" rel="stylesheet">
    <!-- Styles
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/fonts.css') }}" rel="stylesheet">-->

    <!-- <link rel="stylesheet" href="../../bootstrap-3.3.4/css/bootstrap.min.css"> -->
    <!-- <link rel="stylesheet" href="../../css/style.css"> --> 
</head>
<body>
    <!-- <div id="app" class="content">--> <!--La equita id debe ser app, como hemos visto en app.js -->
        <!-- <example-component>!{ message }!</example-component> --> <!--Añadimos nuestro componente vuejs-->
         <!-- !{ message }! 
    </div> -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">        
            <ul class="navbar-nav mr-auto">
                <li class="nav-item dropdown menu-area">                    
                    <a class="nav-link dropdown border-right" href="#" id="mega-one" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><h4><i class="fas fa-bars"> Menú</i></h4>
                    </a>
                    <div class="dropdown-menu mega-area bg-red" aria-labelledby="mega-one">
                        <div class="row mb-20">
                            <div class="col-sm-6 col-lg-2">
                                <h5>Sections</h5><hr>
                                <a class="dropdown-item" href="{{ url('/ambient/') }}">Ambient</a>
                                <a class="dropdown-item" href="{{ url('/art/') }}">Art</a>
                                <a class="dropdown-item" href="{{ url('/culture/') }}">Culture</a>
                                <a class="dropdown-item" href="{{ url('/economic/') }}">Economic</a>
                                <a class="dropdown-item" href="{{ url('/education/') }}">Education</a>
                                <a class="dropdown-item" href="{{ url('/health/') }}">Health</a>
                                <a class="dropdown-item" href="{{ url('/opinion/') }}">Opinion</a>
                                <a class="dropdown-item" href="{{ url('/politic/') }}">Politic</a>
                                <a class="dropdown-item" href="{{ url('/science/') }}">Science</a>
                                <a class="dropdown-item" href="{{ url('/sport/') }}">Sport</a>
                                <a class="dropdown-item" href="{{ url('/technology/') }}">Technology</a>
                                <a class="dropdown-item" href="{{ url('/world/') }}">World</a>
                                <a class="dropdown-item" href="{{ url('/more/') }}">More</a>
                            </div>
                            <div class="col-sm-6 col-lg-2">
                                <h5>Newsletters</h5><hr>
                                <a class="dropdown-item" href="#">Local</a>
                                <a class="dropdown-item" href="#">Nacional</a>
                                <a class="dropdown-item" href="#">Internacional</a>
                            </div>
                            <div class="col-sm-6 col-lg-2">
                                <h5>Alerts</h5><hr>
                                <a class="dropdown-item" href="#">Naturaleza</a>
                                <a class="dropdown-item" href="#">Salud</a>
                                <a class="dropdown-item" href="#">Ciencia</a>
                            </div>
                            <div class="col-sm-6 col-lg-2">
                               <h5>Tools</h5><hr>
                               <div class="col-sm-12">
                               <img src="assets/images/logodemo5.png" alt="100" width="200" />
                               </div>
                               <p>Herramientas de mucha utilidad que deberia tener en cuenta..</p>
                            </div>                            
                        </div>
                    </div>
                </li>
            </ul>
              
                           
        <a class="navbar-brand" href="{{ url('/') }}"></a>
        <a class="navbar-brand" href="{{ url('/news') }}"><b style="color: #f00;">{{ config('app.name', 'Demo') }}</b>
        </a>      
        <!-- <a class="navbar-brand" href="#">Navbar</a> -->
        <!-- <img src="assets/images/logodemo.png" alt="" style="width: 120px;" />
        <img src="../assets/images/logodemo.png" alt="" style="width: 120px;" /> -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>        
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">

                    <a class="nav-link" href="#">The last<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Nación</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Videos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Photos</a>
                </li>
                <li class="nav-item dropdown menu-area">
                    <a class="nav-link dropdown-toggle" href="#" id="mega-one" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Services
                    </a>
                    <div class="dropdown-menu mega-area" aria-labelledby="mega-one">
                        <div class="row">
                            <div class="col-sm-6 col-lg-3">
                                <h5>Web Desing</h5>
                                <a class="dropdown-item" href="#">Html template1</a>
                                <a class="dropdown-item" href="#">Html template2</a>
                                <a class="dropdown-item" href="#">Html template3</a>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <h5>Web Desing 2</h5>
                                <a class="dropdown-item" href="#">Html template1</a>
                                <a class="dropdown-item" href="#">Html template2</a>
                                <a class="dropdown-item" href="#">Html template3</a>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <h5>Web Desing 3</h5>
                                <p>Diseño Avanzado</p>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                               <h5>Web Desing 4</h5>
                               <img src="" alt="" style="width: 100%">
                            </div>
                            <div class="col-sm-6 col-lg-3">
                               <h5>Web Desing 5</h5>
                               <p>Diseño Profesional</p>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="nav-item dropdown menu-area">
                    <a class="nav-link dropdown-toggle" href="#" id="mega-two" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Portafolio
                    </a>
                    <div class="dropdown-menu mega-area" aria-labelledby="mega-two">
                        <div class="row">
                            <div class="col-sm-6 col-lg-3">
                                <h5>Portafolio 1</h5>
                                <img src="" alt="" style="width: 100%">
                            </div>
                            <div class="col-sm-6 col-lg-3">
                               <h5>Portafolio 2</h5>
                               <a class="dropdown-item" href="#">Portafolio1</a>
                               <a class="dropdown-item" href="#">Portafolio2</a>
                               <a class="dropdown-item" href="#">Portafolio3</a>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                               <h5>Portafolio 3</h5>
                               <a class="dropdown-item" href="#">Portafolio1</a>
                               <a class="dropdown-item" href="#">Portafolio2</a>
                               <a class="dropdown-item" href="#">Portafolio3</a>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                               <h5>Tags</h5>
                               <p>
                                <span class="badge badge-secondary">Web Desing</span>
                                <span class="badge badge-secondary">Web Desing1</span>
                                <span class="badge badge-secondary">Web Desing2</span>
                                <span class="badge badge-secondary">Web Desing3</span>
                                <span class="badge badge-secondary">Web Desing4</span>
                                <span class="badge badge-secondary">Web Desing5</span>
                                <span class="badge badge-secondary">Web Desing6</span>
                                <span class="badge badge-secondary">Web Desing7</span>
                               </p>                                              
                            </div>                            
                        </div>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contact</a>
                </li>                                
            </ul>
            <form class="form-inline my-2 my-lg-0">
              <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
            <ul class="navbar-nav mr-0">
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} {{ Auth::user()->id }}<span class="caret"></span>
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
    </nav>

    <script src="{{asset('js/app.js')}}"></script> 

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <!-- <script type="text/javascript" src="js/scriptPrincipal.js"></script>
    <script type="text/javascript" src="js/jquery.js"></script>  -->           
    <!-- <script src="../../js/jquery-1.11.2.min.js"></script> -->

    <!-- <script src="../../bootstrap-3.3.4/js/bootstrap.min.js"></script> -->
    <!-- <script src="../../js/modernizr.js"></script> -->
    <!-- <script src="../../js/app.js"></script> -->
    <!-- <script src="../../js/fun.js"></script> -->
    @yield('content')
            {!! Html::script('js/jquery-2.1.0.min.js') !!}
            {!! Html::script('js/demo_cities.js') !!}
            {!! Html::script('js/demo_regions.js') !!}
            {!! Html::script('js/scriptPrincipal.js') !!}
            {!! Html::script("https://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js") !!} 
</body>
</html>
