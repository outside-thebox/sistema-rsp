<style>

    .letra{
        font-size: 18px;
    }

</style>

<div class="container">
    <h1 style="text-align: center">{{ $titulo }}</h1>

    <div class="row">
        <div class="form-group label-floating col-md-6 letra">
            {{ Form::label('fecha_ingreso', 'Fecha de ingreso:',['class' => 'control-label']) }}
            {{ $ingreso->fecha_ingreso }}
        </div>
        <div class="form-group label-floating col-md-6 letra">
            {{ Form::label('apellido_declarado', 'Apellido declarado:',['class' => 'control-label']) }}
            {{ $ingreso->apellido_declarado }}
        </div>
        <div class="form-group label-floating col-md-6 letra">
            {{ Form::label('nombre_declarado', 'Nombre declarado:',['class' => 'control-label']) }}
            {{ $ingreso->nombre_declarado }}
        </div>
        <div class="form-group label-floating col-md-6 letra">
            {{ Form::label('fecha_nacimiento', 'Fecha de nacimiento:',['class' => 'control-label']) }}
            {{ $ingreso->fecha_nacimiento }}
        </div>

    </div>

    @if(!isset($ban))
        @include('ingresos.fotos')
    @else
        @foreach($ingreso->imagenes as $foto)
            @if(is_object($foto))
                <div class="col-md-2" style="cursor: zoom-in; margin-top: 20px">
                    {{ $foto }}
                </div>
            @endif
        @endforeach
    @endif

    <fieldset style="margin-top: 30px">
        <legend>Datos complementarios del detenido</legend>

        <div class="form-group label-floating col-md-6 letra">
            {{ Form::label('tipo_documento_declarado_id', 'Tipo de documento declarado:',['class' => 'control-label']) }}
            {{ $ingreso->tipo_documento_declarado->descripcion or '' }}
        </div>
        <div class="form-group label-floating col-md-6 letra">
            {{ Form::label('nro_documento_declarado', 'Número de documento declarado:',['class' => 'control-label']) }}
            {{ $ingreso->nro_documento_declarado }}
        </div>
        <div class="form-group label-floating col-md-6 letra">
            {{ Form::label('origen_documento_declarado', 'Origen de documento declarado:',['class' => 'control-label']) }}
            {{ $ingreso->origen_documento_declarado }}
        </div>
        <div class="form-group label-floating col-md-6 letra">
            {{ Form::label('apellido_real', 'Apellido real:',['class' => 'control-label']) }}
            {{ $ingreso->apellido_real }}
        </div>
        <div class="form-group label-floating col-md-6 letra">
            {{ Form::label('nombre_real', 'Nombre real:',['class' => 'control-label']) }}
            {{ $ingreso->nombre_real }}
        </div>
        <div class="form-group label-floating col-md-6 letra">
            {{ Form::label('tipo_documento_real_id', 'Tipo de documento real:',['class' => 'control-label']) }}
            {{ $ingreso->tipo_documento_real->descripcion or '' }}
        </div>
        <div class="form-group label-floating col-md-6 letra">
            {{ Form::label('nro_documento_real', 'Número de documento real:',['class' => 'control-label']) }}
            {{ $ingreso->nro_documento_real }}
        </div>
        <div class="form-group label-floating col-md-6 letra">
            {{ Form::label('origen_documento_real', 'Origen de documento real:',['class' => 'control-label']) }}
            {{ $ingreso->origen_documento_real }}
        </div>
        <div class="form-group label-floating col-md-6 letra">
            {{ Form::label('otros_nombres', 'Otros nombres:',['class' => 'control-label']) }}
            {{ $ingreso->otros_nombres }}
        </div>
        <div class="form-group label-floating col-md-6 letra">
            {{ Form::label('alias', 'Alias:',['class' => 'control-label']) }}
            {{ $ingreso->alias }}
        </div>
        <div class="form-group label-floating col-md-6 letra">
            {{ Form::label('nacionalidad_id', 'Nacionalidad:',['class' => 'control-label']) }}
            {{ $ingreso->nacionalidad->descripcion or ''}}
        </div>
        <div class="form-group label-floating col-md-6 letra">
            {{ Form::label('lugar_nacimiento', 'Lugar de nacimiento:',['class' => 'control-label']) }}
            {{ $ingreso->lugar_nacimiento }}
        </div>
        <div class="form-group label-floating col-md-6 letra">
            {{ Form::label('genero_id', 'Género:',['class' => 'control-label']) }}
            {{ $ingreso->genero->descripcion or '' }}
        </div>
        <div class="form-group label-floating col-md-6 letra">
            {{ Form::label('estado_civil_id', 'Estado civil:',['class' => 'control-label']) }}
            {{ $ingreso->estado_civil->descripcion or '' }}
        </div>
        <div class="form-group label-floating col-md-6 letra">
            {{ Form::label('profesion_id', 'Profesión:',['class' => 'control-label']) }}
            {{ $ingreso->profesion->descripcion or "" }}
        </div>
        <div class="form-group label-floating col-md-6 letra">
            {{ Form::label('identificador_local', 'Identificador local:',['class' => 'control-label']) }}
            {{ $ingreso->identificador_local }}
        </div>
        <div class="form-group label-floating col-md-6 letra">
            {{ Form::label('fecha_egreso', 'Fecha de egreso:',['class' => 'control-label']) }}
            {{ $ingreso->fecha_egreso }}
        </div>

        <div class="form-group col-md-12 letra">
            <div class="checkbox">
                <label>
                    ¿Reincidente? @if($ingreso->reincidente) Si @else No @endif
                </label>
            </div>
        </div>
        <div class="form-group col-md-12 letra">
            <div class="checkbox">
                <label>
                    ¿Curatela? @if($ingreso->curatela) Si @else No @endif
                </label>
            </div>
        </div>
        <div class="form-group col-md-12 letra">
            <div class="checkbox">
                <label>
                    ¿Medida curativa? @if($ingreso->medida_curativa) Si @else No @endif
                </label>
            </div>
        </div>
    </fieldset>
    <fieldset>
        <legend>Prontuario policial</legend>
        <div class="form-group label-floating col-md-6 letra">
            {{ Form::label('jurisdiccion_id', 'Jurisdiccion:',['class' => 'control-label']) }}
            {{ $ingreso->jurisdiccion->descripcion or '' }}
        </div>
        <div class="form-group label-floating col-md-6 letra">
            {{ Form::label('situacion_legal_id', 'Situación legal:',['class' => 'control-label']) }}
            {{ $ingreso->situacion_legal->descripcion or '' }}
        </div>
        <div class="form-group col-md-12 letra">
            <div class="checkbox">
                <label>
                    ¿Alojado? @if($ingreso->alojado) Si @else No @endif
                </label>
            </div>
        </div>
        <div class="form-group col-md-12 letra">
            <div class="checkbox">
                <label>
                    ¿Procesos pendientes? @if($ingreso->procesos_pendientes) Si @else No @endif
                </label>
            </div>
        </div>

        <div class="form-group label-floating col-md-12 letra">
            {{ Form::label('observaciones', 'Observaciones:',['class' => 'control-label']) }}
            {{ $ingreso->observaciones }}
        </div>
    </fieldset>
    <fieldset>
        <legend>Datos judiciales</legend>
        <div class="form-group label-floating col-md-6 letra">
            {{ Form::label('causa_existente_id', 'Causas existentes:',['class' => 'control-label']) }}
            @foreach($ingreso->causas_existentes as $causa_existente)
                <li style="margin-left: 10px">{{ $causa_existente->causa_existente->descripcion }}</li>
            @endforeach
        </div>
    </fieldset>


</div>
