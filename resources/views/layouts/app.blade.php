<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Sistema de ingresos</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}

    <style>
        body {
            font-family: 'Lato';
        }

        .fa-btn {
            margin-right: 6px;
        }
    </style>
</head>
<body id="app-layout">
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
                    Sistema Penitenciario
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    <li><a href="{!! Route('ingresos.index')  !!} ">Ingresos</a></li>
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <li><a href="{{ url('/register') }}">Register</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
    @include("components.modal")

    @yield('content')



    <!-- JavaScripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}

    {!! Html::style('assets/css/HoldOn.css', array('media' => 'screen')) !!}
    {!! Html::style('assets/css/bootstrap-material-datetimepicker.css', array('media' => 'screen')) !!}
    {!! Html::style('bootstrap-material-design/css/bootstrap-material-design.css', array('media' => 'screen')) !!}
    {!! Html::style('bootstrap-material-design/css/bootstrap-material-design.css', array('media' => 'screen')) !!}
    {!! Html::style('bootstrap-material-design/css/jquery.dropdown.css', array('media' => 'screen')) !!}

    {!! Html::script('assets/js/HoldOn.js') !!}
    {!! Html::script('assets/js/moment.min.js') !!}
    {!! Html::script('assets/js/bootstrap-material-datetimepicker.js') !!}
    {!! Html::script('bootstrap-material-design/js/material.min.js') !!}
    {!! Html::script('bootstrap-material-design/js/ripples.min.js') !!}
    {!! Html::script('bootstrap-material-design/js/jquery.dropdown.js') !!}


    <script>

        function cargando(themeName){
            HoldOn.open({
                theme:themeName,
                message:"<h4>"+themeName+"</h4>"
            });

            setTimeout(function(){
                HoldOn.close();
            },300000);
        }

        function traerResultados(url)
        {
            cargando('Buscando resultados');
            $.ajax({
                type: "GET",
                url: url,
                assync: false,
                success: function(data){
                    mostrarDatos(data);
                    HoldOn.close();
                }
            });
        }



        function peticionAjax(destino,datos,redireccionar)
        {
            redireccionar = redireccionar || 0;
            cargando('Guardando...');
            $.ajax({
                type: "Post",
                url: destino,
                data: datos,
                assync: true,
                dataType: "html",
                cache: false,
                contentType: false,
                processData: false,
                success: function(respuesta){

                    //                console.log(respuesta);
                    if(isNaN(respuesta) ) {
                        if(respuesta.substr(0,4) == "http")
                        {
                            window.location.href = respuesta;
                            respuesta = "Datos guardados correctamente";
//                        HoldOn.close();
                        }

                        $("#contenido-modal").html(respuesta);
                        $("#confirmacion").modal(function(){show:true});
//                    HoldOn.close();
                    }
                    else
                    {
                        //                    $("#id_persona").val(respuesta);
                        $("#contenido-modal").html("Datos guardados correctamente");
                        $("#confirmacion").modal(function(){show:true});
//                    HoldOn.close();
                    }
                    HoldOn.close();
                },
                error: function(result) {
                    $("#contenido-modal").html("Hubo un error, consulta con el administrador");
                    $("#confirmacion").modal(function(){show:true});
                    HoldOn.close();
                }


            });
        }

        function darMensaje(mensaje)
        {
            $("#contenido-modal").html(mensaje);
            $("#confirmacion").modal(function(){show:true});
        }


    </script>

    @yield('scripts')
</body>
</html>
