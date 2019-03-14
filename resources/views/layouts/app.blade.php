<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>

    <!-- Styles -->

    <!-- Standard boostrap -->
    {{--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">--}}

    @if (Auth::check())
        <?php $user = Auth::user()->id ?>
        @if(isset($_COOKIE[$user]))
            <link href="{{ request()->cookie($user)}}" rel="stylesheet">
        @else
            <link href="{{ BirdBook\Theme::getTheme() }}" rel="stylesheet">
        @endif
    @else
        <link href="{{ BirdBook\Theme::getTheme() }}" rel="stylesheet">
    @endif


</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/home') }}">
                        {{ config('app.name') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="\{{ Auth::user()->id }}\posts">My Posts</a>
                                    </li>
                                    <li>
                                        <a href="\{{ Auth::user()->id }}\favourites">My Favourites</a>
                                    </li>
                                    @if(Auth::user()->hasRole(1))
                                        <li>
                                            <a href="\admin\users">Users</a>
                                        </li>
                                    @endif
                                    @if(Auth::user()->hasRole(3))
                                        <li>
                                            <a href="\admin\themes">Themes</a>
                                        </li>
                                    @endif
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    <li></li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        @if($flash = session('message'))
            <div id="flash-message" class="alert alert-success fade in" role="alert"
                style= "position: absolute;
                        z-index: 10;
                        bottom: 20px;
                        right: 20px;">
                <a class="close" data-dismiss="alert" href="#"></a>
                {{ $flash }}
            </div>
        @elseif($flash = session('warning'))
            <div id="flash-message" class="alert alert-danger fade in" role="alert">
                <a class="close" data-dismiss="alert" href="#"></a>
                {{ $flash }}
            </div>
        @endif

        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        $(document).ready(function () {
            $(".alert").fadeTo(3500, 600).slideUp(400, function () {
                $(".alert").slideUp(600);
            });
        });</script>
</body>
</html>
