@if(isset($ingreso))
    @if($ingreso->ingresos_fotos)
        @include('components.galeria',array("titulo"=>"Archivos cargados","fotos"=>$ingreso->ingresos_fotos))
    @endif
@endif