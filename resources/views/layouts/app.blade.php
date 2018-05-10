<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>CryptoNinja Forum</title>
    {{--jqery--}}
    <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    {{--toastr css--}}
    <link href="{{ asset('css/toastr.min.css') }}" rel="stylesheet"/>
    {{--higlight.js style--}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/styles/atelier-sulphurpool-dark.min.css">

    <link rel="stylesheet" href="{{ asset('css/styles.css') }}" type="text/css">

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
                    <a class="navbar-brand" href="{{ url('/') }}">
                        CryptoNinja Forum
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
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>



            @if($errors->count() > 0)

                <ul class="list-group-items">
                    @foreach($errors->all() as $error)
                        <li class="list-group-item list-group-item-danger">
                            {{ $error }}

                        </li>
                    @endforeach

                </ul>
                <br>
                <br>
            @endif


        <div class="container">
            <div class="col-md-4">

                <a href="{{ route('discussions.create') }}" class="form-control btn btn-primary">Create a new discussion</a>
                <br>

                <br>

                <div class="panel panel-deafault">
                    <div class="panel-body">
                        <ul class="list-group">
                                <a href="{{ route('forum') }}" class="list-group-item list-group-item-action" style="text-decoration: none;">Home </a>
                                <a href="{{ asset('/forum?filter=me') }}" class="list-group-item list-group-item-action" style="text-decoration: none;">My discussions only</a>
                                <a href="{{ asset('/forum?filter=open') }}" class="list-group-item list-group-item-action" style="text-decoration: none;">Open discussions only</a>
                                <a href="{{ asset('/forum?filter=closed') }}" class="list-group-item list-group-item-action" style="text-decoration: none;">Closed discussions only</a>

                        </ul>
                    </div>

                    @if(Auth::check())
                        @if(Auth::user()->admin)
                            <div class="panel-body">
                                <ul class="list-group">
                                    <li class="list-group-item">
                                        <a href="{{ route('channels.index') }}" style="text-decoration: none;">All Channels</a>
                                    </li>
                                </ul>
                            </div>
                        @endif
                    @endif
                </div>

                <div class="panel panel-deafault">

                    <div class="panel-heading">
                        Channels
                    </div>

                    <div class="panel-body">
                        <ul class="list-group">

                            @foreach($channels as $channel)
                                <a href="{{ route('channel',['slug' => $channel->slug]) }}" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center" style="text-decoration: none;">{{ $channel->title }}
                                    <span class="badge badge-primary badge-pill">{{ $channel->discussions->count() }}</span>
                                </a>
                            @endforeach

                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                @yield('content')
            </div>
        </div>
    </div>


    <div class="panel panel-default">
        <div class="panel-footer text-center">copyright&copy;nemanja.develop 2018</div>
    </div>





    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    {{--toastr js--}}
    <script src="{{ asset('js/toastr.min.js') }}"></script>

    <script>
        @if(Session::has('success'))
            toastr.success('{{ Session::get('success') }}');
        @endif

    </script>
    {{--higlight.js script--}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/highlight.min.js"></script>
    <script>hljs.initHighlightingOnLoad();</script>


</body>
</html>
