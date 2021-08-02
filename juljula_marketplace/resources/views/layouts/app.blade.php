<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Juljula') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://cdn.tiny.cloud/1/uunkxeflhk6ok8m9ed5h28a82es679ky6pktl8zm72warg6t/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script src="https://cdn.tiny.cloud/1/uunkxeflhk6ok8m9ed5h28a82es679ky6pktl8zm72warg6t/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: '#mytextarea'
        });
    </script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-success shadow-sm text-white">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Juljula-shop') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false"
                        aria-label="{{ __('Toggle navigation') }}">
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
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                                    @if(Auth::check() && Auth::user()->isAdmin==1)
                                        <a class="dropdown-item" href="{{ url('auth') }}">{{ __('Dashboard') }}</a>
                                    @else
                                        <a class="dropdown-item" href="{{ url('ads') }}">{{ __('Annonces') }}</a>
                                    @endif
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                             document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>
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
        <!--second navbar-->
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm navbar-hover">


            <a class="navbar-brand" href="#"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHover"
                    aria-controls="navbarDD" aria-expanded="false" aria-label="Navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarHover">
                <ul class="container navbar-nav">
                    @foreach($menus as $menuItem)
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="{{route('category.show', $menuItem->slug)}}"
                               data-toggle="dropdown_remove_dropdown_class_for_clickable_link" aria-haspopup="true"
                               aria-expanded="false">
                                <b>{{$menuItem->name}}</b>
                            </a>
                            <ul class="dropdown-menu">
                                @foreach($menuItem->subcategories as $subMenuItem)
                                    <li>
                                        <a class="dropdown-item dropdown-toggle" href="{{route('subcategory.show', [
                                            $menuItem->slug, $subMenuItem->slug])}}"><b>{{$subMenuItem->name}}</b>
                                        </a>
                                        <ul class="dropdown-menu">
                                            @foreach($subMenuItem->childcategories as $childMenuItem)
                                                <li>
                                                    <a class="dropdown-item" href="{{route('childcategory.show',[
                                                        $menuItem->slug,
                                                        $subMenuItem->slug,
                                                        $childMenuItem->slug
                                                        ])}}"><b>{{$childMenuItem->name}}</b>
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                    @endforeach
                </ul>
            </div>
        </nav>
        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <style>
        /* .navbar li a {
            color: white !important;
        } */

        .dropdown:hover > .dropdown-menu {
            display: block;
        }

        /* hover dropdown menus */
        @media only screen and (max-width: 991px) {
            .navbar-hover .show > .dropdown-toggle::after {
                transform: rotate(-90deg);
            }
        }

        @media only screen and (min-width: 492px) {

            .navbar-hover .collapse ul li {
                position: relative;
            }

            .navbar-hover .collapse ul li:hover > ul {
                display: block
            }

            .navbar-hover .collapse ul ul {
                position: absolute;
                top: 100%;
                left: 0;
                min-width: 250px;
                display: none
            }

            .navbar-hover .collapse ul ul ul {
                position: absolute;
                top: 0;
                left: 100%;
                min-width: 250px;
                display: none
            }

            .vertical-menu a {
                background-color: #fff;
                color: #000;
                display: block;
                padding: 12px;
                text-decoration: none;
            }

            .vertical-menu a:hover {
                background-color: green;
                color: #fff;
            }

            .vertical-menu a.active {
                background-color: green;
                color: #fff;
            }
    </style>
<!--end second navbar-->
    </div>
</body>
</html>
