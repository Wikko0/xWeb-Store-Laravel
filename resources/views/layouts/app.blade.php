<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    @forelse($settings as $setting)
        <title>{{ Route::currentRouteName() }} | {{$setting->title }}</title>
    @empty
        <title>{{ Route::currentRouteName() }} | xWeb</title>
    @endforelse
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap-theme.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/fontAwesome.css')}}">
    <link rel="stylesheet" href="{{asset('css/hero-slider.css')}}">
    <link rel="stylesheet" href="{{asset('css/owl-carousel.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">


    <link href="https://fonts.googleapis.com/css?family=Raleway:100,200,300,400,500,600,700,800,900" rel="stylesheet">

    <script src="{{asset('js/vendor/modernizr-2.8.3-respond-1.4.2.min.js')}}"></script>
</head>

<body>

<div class="wrap">
    <header id="header">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <button id="primary-nav-button" type="button">Menu</button>
                    <a href="/">
                        <div class="logo">
                            <img src="{{asset('storage/uploads/logo.png')}}" alt="xWeb Logo">
                        </div>
                    </a>
                    <nav id="primary-nav" class="dropdown cf">
                        <ul class="dropdown menu">
                            <li class='active'><a href="/">Home</a></li>

                            <li><a href="/about">About Website</a></li>

                            <li><a href="/contact">Contact Us</a></li>
                            @guest


                                @if (Route::has('Register'))
                                    <li><a href="/register">Register</a></li>
                                @endif

                                @if (Route::has('Login'))
                                    <li><a href="/login">Login</a></li>
                                @endif
                            @else

                                <li><a href="/account">Welcome {{ Auth::user()->name }}</a></li>
                                <li><a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </li>
                            @endguest


                        </ul>
                    </nav><!-- / #primary-nav -->
                </div>
            </div>
        </div>
    </header>
</div>


@yield('header')

@yield('content')


<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <div class="about-veno">
                    <div class="logo">
                        <img src="{{asset('storage/uploads/footer_logo.png')}}" alt="XWEB Logo">
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="useful-links">
                    <div class="footer-heading">
                        <h4>Useful Links</h4>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <ul>
                                <li><a href="/"><i class="fa fa-stop"></i>Home</a></li>
                                <li><a href="/about"><i class="fa fa-stop"></i>About</a></li>
                                <li><a href="/contact"><i class="fa fa-stop"></i>Contact Us</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="contact-info">
                    <div class="footer-heading">
                        <h4>Contact Information</h4>
                    </div>
                    <ul>
                        @forelse($settings as $setting)
                            <li><span>Email:</span><a href="#">{{$setting->email}}</a></li>
                        @empty
                            <li><span>Email:</span><a href="#">victor.minchew@gmail.com</a></li>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>

<div class="sub-footer">
    @forelse($settings as $setting)
        <p>Copyright © {{ date("Y") }} {{$setting->web_name}} </p>
    @empty
        <p>Copyright © {{ date("Y") }} XWEB </p>
    @endforelse
</div>

<script src="{{asset('https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js')}}"
        type="text/javascript"></script>
<script>window.jQuery || document.write('<script src="{{asset('js/vendor/jquery-1.11.2.min.js')}}"><\/script>')</script>

<script src="{{asset('js/vendor/bootstrap.min.js')}}"></script>

<script src="{{asset('js/datepicker.js')}}"></script>
<script src="{{asset('js/plugins.js')}}"></script>
<script src="{{asset('js/main.js')}}"></script>
<script src="{{asset('js/scriptshop.js')}}"></script>
</body>
</html>
