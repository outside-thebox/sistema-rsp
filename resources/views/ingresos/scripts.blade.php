@section('scripts')

    @include('ingresos.shared_functions')

    <script>
        $(function () {
            $.material.init();

            @if(isset($ingreso))
                obtenerCombo("tipo_documento_declarado","{{ $ingreso->tipo_documento_declarado_id }}","{{route('api.v1.tipos_documentos.index')}}");
                obtenerCombo("tipo_documento_real","{{ $ingreso->tipo_documento_real_id }}","{{route('api.v1.tipos_documentos.index')}}");
                obtenerCombo("nacionalidad","{{ $ingreso->nacionalidad_id }}","{{route('api.v1.nacionalidades.index')}}");
                obtenerCombo("genero","{{ $ingreso->genero_id }}","{{route('api.v1.generos.index')}}");
                obtenerCombo("estado_civil","{{ $ingreso->estado_civil_id }}","{{route('api.v1.estados_civiles.index')}}");
                obtenerCombo("profesion","{{ $ingreso->profesion_id }}","{{route('api.v1.profesiones.index')}}");
                obtenerCombo("jurisdiccion","{{ $ingreso->jurisdiccion_id }}","{{route('api.v1.jurisdicciones.index')}}");
                obtenerCombo("situacion_legal","{{ $ingreso->situacion_legal_id }}","{{route('api.v1.situaciones_legales.index')}}");
                obtenerCombo("causa_existente","{{ $ingreso->causa_existente_id }}","{{route('api.v1.causas_existentes.index')}}");
            @else
                obtenerCombo("tipo_documento_declarado","","{{route('api.v1.tipos_documentos.index')}}");
                obtenerCombo("tipo_documento_real","","{{route('api.v1.tipos_documentos.index')}}");
                obtenerCombo("nacionalidad","","{{route('api.v1.nacionalidades.index')}}");
                obtenerCombo("genero","","{{route('api.v1.generos.index')}}");
                obtenerCombo("estado_civil","","{{route('api.v1.estados_civiles.index')}}");
                obtenerCombo("profesion","","{{route('api.v1.profesiones.index')}}");
                obtenerCombo("jurisdiccion","","{{route('api.v1.jurisdicciones.index')}}");
                obtenerCombo("situacion_legal","","{{route('api.v1.situaciones_legales.index')}}");
                obtenerCombo("causa_existente","","{{route('api.v1.causas_existentes.index')}}");
            @endif
//            $('.fecha').bootstrapMaterialDatePicker({format:'DD/MM/YYYY',time:false});


            $('#fecha_nacimiento').bootstrapMaterialDatePicker({format:'DD/MM/YYYY',time:false});
            $('#fecha_egreso').bootstrapMaterialDatePicker({format:'DD/MM/YYYY',time:false});
            $('#fecha_ingreso').bootstrapMaterialDatePicker({format:'DD/MM/YYYY',time:false}).on('change', function(e, date)
            {
                $('#fecha_egreso').bootstrapMaterialDatePicker('setMinDate', date);
            });

            $(".select").dropdown({ "autoinit" : ".select" });

            $("#frmIngreso").on("submit", function(e){

                e.preventDefault();
//                if(validarPaso3())
//                {
                var formData = new FormData(document.getElementById("frmIngreso"));
//            formData.append("id_oficio",$("#id").val());
                var destino = "{{ Route('ingresos.store') }}";
                peticionAjax(destino,formData,"Redireccionar");
//                }

            });


            $(".agregar_foto").click(function (event) {
                event.preventDefault();
                var contenedor = $(this).attr('data-contenedor');
                var receptor = $(this).attr('data-receptor');
                $(contenedor).clone().appendTo(receptor);
            });


        });



    </script>

@endsection