@extends('layouts.app')

@include('ingresos.scripts')


@section('content')


    {!! Form::model(isset($ingreso) ? $ingreso:null ,$form_data, ['role' => 'form']) !!}
    <div class="container">
        <h1>Agregando nuevo ingreso</h1>

        <div class="row">
            <div class="form-group label-floating col-md-6">
                {{ Form::label('fecha_ingreso', 'Fecha de ingreso',['class' => 'control-label']) }}
                {{ Form::text( 'fecha_ingreso',null, ['class' => 'form-control','id' => 'fecha_ingreso']) }}
            </div>
            <div class="form-group label-floating col-md-6">
                {{ Form::label('apellido_declarado', 'Apellido declarado',['class' => 'control-label']) }}
                {{ Form::text( 'apellido_declarado',null, ['class' => 'form-control','maxlength' => 100]) }}
            </div>
            <div class="form-group label-floating col-md-6">
                {{ Form::label('nombre_declarado', 'Nombre declarado',['class' => 'control-label']) }}
                {{ Form::text( 'nombre_declarado',null, ['class' => 'form-control','maxlength' => 100]) }}
            </div>
            <div class="form-group label-floating col-md-6">
                {{ Form::label('fecha_nacimiento', 'Fecha de nacimiento',['class' => 'control-label']) }}
                {{ Form::text( 'fecha_nacimiento',null, ['class' => 'form-control fecha','id' => 'fecha_nacimiento']) }}
            </div>

            <div id="divArchivos">
                <div class="col-md-12" id="foto">
                    {!! Form::label('foto','Foto',['class' => 'control-label']) !!}
                    @include('components.add_file',array('nombre'=>'foto[archivos][]','i'=>0,'eliminar'=>false,'nombre_campo'=>'Fotos','attributes' => ['class' => 'form-control']))
                </div>
                <div id="fotos_append">

                </div>
                <div class="row">
                    <div class="col-md-3">
                        <a href="#" class="agregar_foto" data-contenedor="#foto" data-receptor="#fotos_append">Agregar Más</a>
                    </div>
                </div>

                @include('components.fotos')

            </div>



        </div>

        <fieldset style="margin-top: 30px">
            <legend>Datos complementarios del detenido</legend>

            <div class="form-group label-floating col-md-6">
                {{ Form::label('tipo_documento_declarado_id', 'Tipo de documento declarado',['class' => 'control-label']) }}
                {{ Form::select('tipo_documento_declarado_id',[], null, ['class' => 'form-control select']) }}
            </div>
            <div class="form-group label-floating col-md-6">
                {{ Form::label('nro_documento_declarado', 'Número de documento declarado',['class' => 'control-label']) }}
                {{ Form::text('nro_documento_declarado',null, ['class' => 'form-control','maxlength' => 20]) }}
            </div>
            <div class="form-group label-floating col-md-6">
                {{ Form::label('origen_documento_declarado', 'Origen de documento declarado',['class' => 'control-label']) }}
                {{ Form::text('origen_documento_declarado',null, ['class' => 'form-control','maxlength' => 50]) }}
            </div>
            <div class="form-group label-floating col-md-6">
                {{ Form::label('apellido_real', 'Apellido real',['class' => 'control-label']) }}
                {{ Form::text('apellido_real',null, ['class' => 'form-control','maxlength' => 100]) }}
            </div>
            <div class="form-group label-floating col-md-6">
                {{ Form::label('nombre_real', 'Nombre real',['class' => 'control-label']) }}
                {{ Form::text('nombre_real',null, ['class' => 'form-control','maxlength' => 100]) }}
            </div>
            <div class="form-group label-floating col-md-6">
                {{ Form::label('tipo_documento_real_id', 'Tipo de documento real',['class' => 'control-label']) }}
                {{ Form::select('tipo_documento_real_id',[], null, ['class' => 'form-control select']) }}
            </div>
            <div class="form-group label-floating col-md-6">
                {{ Form::label('nro_documento_real', 'Número de documento real',['class' => 'control-label']) }}
                {{ Form::text('nro_documento_real',null, ['class' => 'form-control','maxlength' => 20]) }}
            </div>
            <div class="form-group label-floating col-md-6">
                {{ Form::label('origen_documento_real', 'Origen de documento real',['class' => 'control-label']) }}
                {{ Form::text('origen_documento_real',null, ['class' => 'form-control','maxlength' => 50]) }}
            </div>
            <div class="form-group label-floating col-md-6">
                {{ Form::label('otros_nombres', 'Otros nombres',['class' => 'control-label']) }}
                {{ Form::text('otros_nombres',null, ['class' => 'form-control','maxlength' => 100]) }}
            </div>
            <div class="form-group label-floating col-md-6">
                {{ Form::label('alias', 'Alias',['class' => 'control-label']) }}
                {{ Form::text('alias',null, ['class' => 'form-control','maxlength' => 100]) }}
            </div>
            <div class="form-group label-floating col-md-6">
                {{ Form::label('nacionalidad_id', 'Nacionalidad',['class' => 'control-label']) }}
                {{ Form::select('nacionalidad_id',[], null, ['class' => 'form-control select']) }}
            </div>
            <div class="form-group label-floating col-md-6">
                {{ Form::label('lugar_nacimiento', 'Lugar de nacimiento',['class' => 'control-label']) }}
                {{ Form::text('lugar_nacimiento',null, ['class' => 'form-control','maxlength' => 100]) }}
            </div>
            <div class="form-group label-floating col-md-6">
                {{ Form::label('genero_id', 'Género',['class' => 'control-label']) }}
                {{ Form::select('genero_id',[], null, ['class' => 'form-control select']) }}
            </div>
            <div class="form-group label-floating col-md-6">
                {{ Form::label('estado_civil_id', 'Estado civil',['class' => 'control-label']) }}
                {{ Form::select('estado_civil_id',[], null, ['class' => 'form-control select']) }}
            </div>
            <div class="form-group label-floating col-md-6">
                {{ Form::label('profesion_id', 'Profesión',['class' => 'control-label']) }}
                {{ Form::select('profesion_id',[], null, ['class' => 'form-control select']) }}
            </div>
            <div class="form-group label-floating col-md-6">
                {{ Form::label('identificador_local', 'Identificador local',['class' => 'control-label']) }}
                {{ Form::text('identificador_local',null, ['class' => 'form-control','maxlength' => 200]) }}
            </div>
            <div class="form-group label-floating col-md-6">
                {{ Form::label('fecha_egreso', 'Fecha de egreso',['class' => 'control-label']) }}
                {{ Form::text( 'fecha_egreso',null, ['class' => 'form-control','id' => 'fecha_egreso']) }}
            </div>

            <div class="form-group col-md-12">
                <div class="checkbox">
                    <label>
                        {{ Form::checkbox('reincidente', '1') }} ¿Reincidente?
                    </label>
                </div>
            </div>
            <div class="form-group col-md-12">
                <div class="checkbox">
                    <label>
                        {{ Form::checkbox('curatela', '1') }} ¿Curatela?
                    </label>
                </div>
            </div>
            <div class="form-group col-md-12">
                <div class="checkbox">
                    <label>
                        {{ Form::checkbox('medida_curativa', '1') }} ¿Medida curativa?
                    </label>
                </div>
            </div>
        </fieldset>
        <fieldset>
            <legend>Prontuario policial</legend>
            <div class="form-group label-floating col-md-6">
                {{ Form::label('jurisdiccion_id', 'Jurisdiccion',['class' => 'control-label']) }}
                {{ Form::select('jurisdiccion_id',[], null, ['class' => 'form-control select']) }}
            </div>
            <div class="form-group label-floating col-md-6">
                {{ Form::label('situacion_legal_id', 'Situación legal',['class' => 'control-label']) }}
                {{ Form::select('situacion_legal_id',[], null, ['class' => 'form-control select']) }}
            </div>
            <div class="form-group col-md-12">
                <div class="checkbox">
                    <label>
                        {{ Form::checkbox('alojado', '1') }} ¿Alojado?
                    </label>
                </div>
            </div>
            <div class="form-group col-md-12">
                <div class="checkbox">
                    <label>
                        {{ Form::checkbox('procesos_pendientes', '1') }} Procesos pendientes
                    </label>
                </div>
            </div>

            <div class="form-group label-floating col-md-12">
                {{ Form::label('observaciones', 'Observaciones',['class' => 'control-label']) }}
                {{ Form::textarea('observaciones', null, ['class' => 'form-control','style' => 'resize: none']) }}
            </div>
        </fieldset>
        <fieldset>
            <legend>Datos judiciales</legend>
            <div class="form-group label-floating col-md-6">
                {{ Form::label('causa_existente_id', 'Causa existente',['class' => 'control-label']) }}
                {{ Form::select('causa_existente_id',[], null, ['class' => 'form-control select']) }}
            </div>
        </fieldset>


        <div class="row">
            <div class="form-group col-md-12" >
                {!! Form::button("Guardar", ['type' => 'submit', 'class' => 'btn btn-raised btn-primary pull-right']) !!}
                <a href="{!! route('ingresos.index') !!}" class="btn btn-raised btn-warning pull-right" style="margin-right: 10px">Cancelar</a>
            </div>
        </div>








    </div>
    {!! Form::close() !!}

@endsection
