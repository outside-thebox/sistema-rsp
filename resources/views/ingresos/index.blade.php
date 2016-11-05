@extends('layouts.app')

@section('scripts')
    {!! Html::script('assets/js/jquery.mask.js') !!}

    <script>



        function mostrarDatos(data)
        {
            $("#table").empty();
            var data_pagina = data.data;
//            console.log(data);
            var data = data.data.data;
            if(data.length){
                $("#sin_datos").addClass("hidden");
                $("#div_data").removeClass("hidden");

                var firstUrl = "{{route('api.v1.ingresos.index')}}" + "?page=1";
                if(data_pagina.next_page_url)
                {
                    var nextUrl = data_pagina.next_page_url;
                    $("#next").removeClass("hidden");
                }
                else
                {
                    $("#next").addClass("hidden");
                }

                if(data_pagina.prev_page_url)
                {
                    var prevUrl = data_pagina.prev_page_url;
                    $("#prev").removeClass("hidden");
                }
                else
                {
                    $("#prev").addClass("hidden");
                }



//            console.log(data_pagina.next_page.slice(0,-1));

                var lastUrl = "{{route('api.v1.ingresos.index')}}" + "?page="+data_pagina.last_page;

                //console.log(nextUrl);
                $("#first").data('url',firstUrl);
                $("#next").data('url',nextUrl);
                $("#pagina_actual").text('Página '+ data_pagina.current_page + ' de '+ data_pagina.last_page + '. Cantidad de registros: ' + data_pagina.total);
                $("#prev").data('url',prevUrl);
                $("#last").data('url',lastUrl);


                var len = data.length;
                var txt = "";
                var urlShow = '';
                var urlEdit = '';

                if(len > 0){

                    for(var i=0;i<len;i++)
                    {
                        var url = "{{route('ingresos.index')}}";
                        urlShow = url + "/show/" + data[i].id;
                        urlEdit = url + "/" + data[i].id + "/edit";
                        var boton_ver = "<a title='Ver' style='margin-left: 7px' href='" + urlShow + "'><i class='glyphicon glyphicon-eye-open styleButtonImage' ></i></a>";
                        var boton_editar = "<a title='Editar' href='" + urlEdit + "'><i class='glyphicon glyphicon-edit styleButtonImage' ></i></a>";

                        txt += "<tr>";

                        txt += "<td>"+data[i].nombre_declarado+"</td>";
                        txt += "<td>"+data[i].apellido_declarado+ "</td>";
                        txt += "<td>"+data[i].nro_documento_declarado+ "</td>";
                        txt += "<td>"+data[i].apellido_real+"</td>";
                        txt += "<td>"+data[i].nombre_real+"</td>";
                        txt += "<td>"+boton_ver +"    "+ boton_editar+"</td>";
                        txt += "</tr>";
                    }
                    if(txt != ""){
                        $("#table").append(txt).removeClass("hidden");
                    }
                }
            }
            else
            {
                $("#div_data").addClass("hidden");
                $("#sin_datos").removeClass("hidden");
            }
        }

        function filtrarIngresos() {
            var params = "";


            if($('input:text[name=fecha_ingreso]').val() != "")
            {
                var fecha_ingreso_array = $('input:text[name=fecha_ingreso]').val().split('/');
                var fecha_ingreso = fecha_ingreso_array[2] + '-' + fecha_ingreso_array[1] + '-' + fecha_ingreso_array[0];
                params += "like[fecha_ingreso]="+fecha_ingreso;
            }

            if($('input:text[name=fecha_nacimiento]').val() != "")
            {
                var fecha_nacimiento_array = $('input:text[name=fecha_nacimiento]').val().split('/');
                var fecha_nacimiento = fecha_nacimiento_array[2] + '-' + fecha_nacimiento_array[1] + '-' + fecha_nacimiento_array[0];
                params += "&like[fecha_nacimiento]="+fecha_nacimiento;
            }
            if($('input:text[name=apellido_declarado]').val() != "")
            {
                params += "&like[apellido_declarado]="+ $('input:text[name=apellido_declarado]').val();
            }

            return params;
        }
        /*function filtrarEntidades() {
            var resultado = "";
            if($('#id_entidad').val() != "")
                resultado += darPipe(resultado)+"id_entidad:"+$('#id_entidad').val();

            return resultado;

        }
        function filtrarCargos() {

            var resultado = "";
            if($('#id_cargo').val() != "")
                resultado += darPipe(resultado)+"id:"+$('#id_cargo').val();

            return resultado;

        }*/
        function buscar(excel, url)
        {
            var filtroIngresos = filtrarIngresos();
            /*var filtroEntidades = filtrarEntidades();
            var filtroCargos = filtrarCargos();
            var relationships = 'relaciones[]=cargo' + filtroCargos +
                    '&relaciones[]=entidadesxpersonal' + filtroEntidades;
            */
            if(url == '') url = "{{route('api.v1.ingresos.index')}}" + "?" + "page=1";

            var queryString = url + "&" + filtroIngresos;
//            console.log(queryString);
            if(excel===true) {
                var href = root + "?urlAPI=" + encodeURIComponent(queryString);
                $("#btnExportar").attr("href",href);
            }else {
                queryString +=  "&methodFilter=filterWithPaginate";
                traerResultados(queryString);
            }

        }



        $(function(){

            $.material.init();
//            $('.fecha').bootstrapMaterialDatePicker({format:'DD/MM/YYYY',time:false});
            $(".fecha").mask("99/99/9999");



            var root = "{{route('api.v1.ingresos.index')}}";
//            var params = "relaciones[]=cargo.id_tipo_persona:1&relaciones[]=entidadesxpersonal&paginate=10";
//            var queryString = root + "?" + params;
            var queryString = root;

//        traerResultados(queryString);


            $('#buscar').on('click', function(e) {

                if($("input:text[name='fecha_ingreso']").val() != "" || $("input:text[name='apellido_declarado']").val() != "" || $("input:text[name='fecha_nacimiento']").val() != "")
                {
//                    console.log($("input:text[name='fecha_ingreso']").val());
                    var ban = true;
                    if(validDate($("input:text[name='fecha_ingreso']").val(),"Fecha de ingreso"))
                    {
                        ban = false;
                    }
                    if(validDate($("input:text[name='fecha_nacimiento']").val(),"Fecha de nacimiento"))
                    {
                        ban = false;
                    }

                    if(ban)
                    {
//                        console.log();
                        buscar(false,'');
                    }
                }
                else
                    darMensaje("Debe completar al menos un campo");
//                    console.log("hola");
            });

            $("#next, #prev, #first, #last").on('click', function(e){
                e.preventDefault();
                var url = $(this).data('url');
                buscar(false, url);
            });


            $("#btnExportar").on('click',function(){
                buscar(true,'');
            });
        });



    </script>
@endsection

@section('content')
    <div class="container">
        <h1>Búsqueda de ingresos <a href="{!! route('ingresos.create')!!}"><button class="btn btn-raised btn-success pull-right" >Agregar</button></a></h1>
        <br>

        <div class="form-inline">

            <div class="form-group label-floating">
                {{ Form::label('fecha_ingreso', 'Fecha de ingreso',['class' => 'control-label']) }}
                {{ Form::text( 'fecha_ingreso',null, ['class' => 'form-control fecha']) }}
            </div>

            <div class="form-group label-floating">
                {{ Form::label('apellido_declarado', 'Apellido declarado',['class' => 'control-label']) }}
                {{ Form::text( 'apellido_declarado',null, ['class' => 'form-control','maxlength' => 100]) }}
            </div>
            <div class="form-group label-floating">
                {{ Form::label('fecha_nacimiento', 'Fecha de nacimiento',['class' => 'control-label']) }}
                {{ Form::text( 'fecha_nacimiento',null, ['class' => 'form-control fecha']) }}
            </div>

            {{ Form::button('Buscar',['id' => 'buscar','class' => 'btn btn-raised btn-info']) }}


        </div>
        <br>

        <div id="div_data" class="hidden">
            {{ Form::button('Primera',['id' => 'first','class' => 'btn btn-success','data-url'=>'']) }}
            {{ Form::button('Anterior',['id' => 'prev','class' => 'btn btn-success','data-url'=>'']) }}
            {{ Form::button('Última',['id' => 'last','class' => 'btn btn-success pull-right','data-url'=>'']) }}
            {{ Form::button('Siguiente',['id' => 'next','class' => 'btn btn-success pull-right','data-url'=>'']) }}
            <table class="table responsive table-bordered table-hover table-striped" >
                <thead>
                <tr>
                    <th>Nombre declarado</th>
                    <th>Apellido declarado</th>
                    <th>Nro de documento declarado</th>
                    <th>Apellido real</th>
                    <th>Nombre real</th>
                    <th>Acciones</th>
                </tr>
                </thead>
                <tbody id="table">
                </tbody>
            </table>
            <label id="pagina_actual" class="pull-right" >Pagina actual: </label>
        </div>
        <h2 id="sin_datos" class="hidden text-center">No se encontraron resultados</h2>
    </div>
@endsection