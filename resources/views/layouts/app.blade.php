<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <!-- Latest compiled and minified CSS -->


    @if(Auth::check())
     <link rel="stylesheet" href="https://bootswatch.com/cerulean/bootstrap.css"> 
    @if(auth()->user()->background==1)
      <link rel="stylesheet" href="https://bootswatch.com/cerulean/bootstrap.css"> 
      @endif
        @if(auth()->user()->background==2)
        <link rel="stylesheet" href="https://bootswatch.com/darkly/bootstrap.css">
        @endif 
          @if(auth()->user()->background==3)
        <link rel="stylesheet" href="https://bootswatch.com/lumen/bootstrap.css">
    @endif 
    @else

        <link rel="stylesheet" href="https://bootswatch.com/cerulean/bootstrap.css"> 
        
        @endif




      <!--<link rel="stylesheet" href="{{asset("css/bootstrap.css")}}"> -->
      

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
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
                        {{ config('app.name', 'Laravel') }}
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
                           <!-- <li><a href="{{ route('register') }}">Register</a></li>  no debe ser visible-->
                        @else
                            <li class="dropdown">
                                 <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" style="position:relative; padding-left:50px;">
                                <img src="/proyectogit/public/uploads/avatars/{{Auth::user()->avatar }}" style="width:32px; height:32px; position:absolute; top:10px; left:10px; border-radius:50%">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="{{url('/profile')}}" ><i class="glyphicon glyphicon-user" ></i>Perfil </a> </li>
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="glyphicon glyphicon-off" ></i>
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

    <div class="container">
        <div class="row">
            <div class="col-md-3">
                @include('includes.menu')
            </div>
            <div class="col-md-9">
                @yield('content')
            </div>
        </div>
    </div>
        
    </div>

       <script type="text/javascript">
            setTimeout(function() {
                $("#alerta").fadeOut(3000);
            },2000);
      </script>

    <footer class="text-center">
        <hr>
       Sistema De Gestion De Pacientes  &copy; 2017
    </footer>

    <!-- Scripts -->
    <script
  src="http://code.jquery.com/jquery-3.2.1.min.js"
  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  crossorigin="anonymous"></script>



  <!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" 
integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" 
crossorigin="anonymous"></script>

</body>
</html>
