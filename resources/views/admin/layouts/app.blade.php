<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', '¡Nube - Dashboard') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>

    <div id='app'></div>

    <div class="wrapper">
        <!-- Sidebar Holder -->
        <nav id="sidebar">
            <a class="navbar-brand ml-4 pt-4" href="#">
                <img src="{{asset('/img/logo_Sin_fondo.png')}}" width="30" height="30" class="d-inline-block align-top"
                    alt="">
                ¡Nube
            </a>

            <div class="container mt-4 mb-2">
                <div class="mb-2">
                    <img  class="img-responsive" style="border-radius: 50%;" alt="" width="70">
                </div>
                <div class="profile-usertitle">
                    <div class="profile-usertitle-name">{{Auth::user()->name}}</div>
                    <div class="profile-usertitle-status">{{Auth::user()->email}}</div>
                </div>
            </div>


            <ul class="list-unstyled components">
                @include('admin.partials.menu')
            </ul>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </nav>

        <!-- Page Content Holder -->
        <div id="content">

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="navbar-btn">
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>

                    <div id="navbarSupportedContent">
                        <ul class="nav navbar-nav ml-auto">
                            <li class="nav-item">
                                <a>@yield('page')</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            @include('admin.partials.alert')
            @include('admin.partials.error')



            @yield('content')

            <script src="{{asset('js/slim.js')}}"></script>
            <script type="text/javascript">
                $(document).ready(function () {
                $('#sidebarCollapse').on('click', function () {
                    $('#sidebar').toggleClass('active');
                    $(this).toggleClass('active');
                });
            });
            </script>



            <script src="{{ asset('js/bootstrap.min.js')}}"></script>


            @yield('scripts')

    </div>
</body>

</html>