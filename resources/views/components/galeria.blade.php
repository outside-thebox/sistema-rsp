@if( (Request::segment(2) != 'pdf') and ($fotos != null))
<div class="panel panel-info">
    <div class="panel-heading">
        <h3 class="panel-title">{{ $titulo }}</h3>
    </div>
    <div class="panel-body">
        <div class="your-class">
            <div class="row">
                @foreach($fotos as $foto)
                    @if(is_object($foto))
                        @if(substr($foto->path, -3) == "pdf")
                            <div class="col-md-2" style="cursor: zoom-in"><a href="{{ Route('archivos.descargar')}}?q={{ $foto->foto }}" target="_blank" >
                                    <img src="{{ Route('archivos.descargar')}}?q=imagen.jpg" width="150px" height="150px"></a>
                                </div>
                        @else
                            <div class="col-md-2" style="cursor: zoom-in"><a href="{{ Route('archivos.descargar')}}?q={{ $foto->foto }}" target="_blank" ><img src="{{ Route('archivos.descargar')}}?q={{ $foto->foto }}" width="150px" height="150px"></a></div>
                        @endif
                    @endif
                @endforeach
            </div>
        </div>
    </div>
</div>
@endif