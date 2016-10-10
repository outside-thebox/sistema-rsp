@section('scripts')

    <script>

        function obtenerCombo(name,selected,url)
        {
            selected = selected || "";
            $("select[name="+name+"_id]").empty();
            $.getJSON(url,function(data){
                $.each(data, function(k,v){
                    $.each(v, function(l,d){
                        if(d.id == selected)
                            $("select[name="+name+"_id]").append("<option value=\""+ d.id+"\" selected>"+ d.descripcion+"</option>");
                        else
                            $("select[name="+name+"_id]").append("<option value=\""+ d.id+"\">"+ d.descripcion+"</option>");
                    });
                });
            });
        }




        $(function () {
            $.material.init();

            obtenerCombo("tipo_documento_declarado","","{{route('api.v1.tipos_documentos.index')}}");
            obtenerCombo("tipo_documento_real","","{{route('api.v1.tipos_documentos.index')}}");
            obtenerCombo("nacionalidad","","{{route('api.v1.nacionalidades.index')}}");
            obtenerCombo("genero","","{{route('api.v1.generos.index')}}");
            obtenerCombo("estado_civil","","{{route('api.v1.estados_civiles.index')}}");
            obtenerCombo("profesion","","{{route('api.v1.profesiones.index')}}");
            obtenerCombo("jurisdiccion","","{{route('api.v1.jurisdicciones.index')}}");
            obtenerCombo("situacion_legal","","{{route('api.v1.situaciones_legales.index')}}");
            obtenerCombo("causa_existente","","{{route('api.v1.causas_existentes.index')}}");

            $('.fecha').bootstrapMaterialDatePicker({format:'DD/MM/YYYY',time:false});

            $(".select").dropdown({ "autoinit" : ".select" });

            $("#frmIngreso").on("submit", function(e){

                e.preventDefault();
//                if(validarPaso3())
//                {
                var formData = new FormData(document.getElementById("frmIngreso"));
//            formData.append("id_oficio",$("#id").val());
                var destino = "{{ Route('ingresos.store') }}";
                peticionAjax(destino,formData);
//                }

            });


        });



    </script>

@endsection