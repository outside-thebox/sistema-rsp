@extends('layouts.app')

@section('scripts')

    @include('ingresos.shared_functions')

    <script>

        $(function () {
            $.material.init();
            $("input").prop('disabled', true);
            $(".select").dropdown({ "autoinit" : ".select" });
            $(".select").prop('disabled', true);
            $("textarea").prop('disabled', true);

            obtenerCombo("tipo_documento_declarado","{{ $ingreso->tipo_documento_declarado_id }}","{{route('api.v1.tipos_documentos.index')}}");
            obtenerCombo("tipo_documento_real","{{ $ingreso->tipo_documento_real_id }}","{{route('api.v1.tipos_documentos.index')}}");
            obtenerCombo("nacionalidad","{{ $ingreso->nacionalidad_id }}","{{route('api.v1.nacionalidades.index')}}");
            obtenerCombo("genero","{{ $ingreso->genero_id }}","{{route('api.v1.generos.index')}}");
            obtenerCombo("estado_civil","{{ $ingreso->estado_civil_id }}","{{route('api.v1.estados_civiles.index')}}");
            obtenerCombo("profesion","{{ $ingreso->profesion_id }}","{{route('api.v1.profesiones.index')}}");
            obtenerCombo("jurisdiccion","{{ $ingreso->jurisdiccion_id }}","{{route('api.v1.jurisdicciones.index')}}");
            obtenerCombo("situacion_legal","{{ $ingreso->situacion_legal_id }}","{{route('api.v1.situaciones_legales.index')}}");
            obtenerCombo("causa_existente","{{ $ingreso->causa_existente_id }}","{{route('api.v1.causas_existentes.index')}}");



        });



    </script>


@endsection

@section('content')


    @include('ingresos.PDF')

    <div class="row">
        <div class="form-group col-md-12" id="botones_confirmar">
            <a href="{{ Route('ingresos.exportarPDF',$ingreso->id) }}" class="btn btn-info pull-right" target="_blank" style="margin-right: 10px">Exportar</a>
            <a href="{!! route('ingresos.index') !!}" class="btn btn-success pull-right" style="margin-right: 10px">Volver</a>
        </div>
    </div>


@endsection
