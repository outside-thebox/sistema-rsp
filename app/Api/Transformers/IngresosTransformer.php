<?php namespace App\Api\Transformers;
use JuaGuz\ApiGenerator\BaseTransformer;
class IngresosTransformer extends BaseTransformer
{

    /**
     * @param $item
     * @return array
     */
    public function transform($item)
    {
        return  [
            'id'=>$item['id'],
'fecha_ingreso'=>$item['fecha_ingreso'],
'apellido_declarado'=>$item['apellido_declarado'],
'nombre_declarado'=>$item['nombre_declarado'],
'fecha_nacimiento'=>$item['fecha_nacimiento'],
'tipo_documento_declarado_id'=>$item['tipo_documento_declarado_id'],
'nro_documento_declarado'=>$item['nro_documento_declarado'],
'origen_documento_declarado'=>$item['origen_documento_declarado'],
'apellido_real'=>$item['apellido_real'],
'nombre_real'=>$item['nombre_real'],
'tipo_documento_real_id'=>$item['tipo_documento_real_id'],
'nro_documento_real'=>$item['nro_documento_real'],
'origen_documento_real'=>$item['origen_documento_real'],
'otros_nombres'=>$item['otros_nombres'],
'alias'=>$item['alias'],
'nacionalidad_id'=>$item['nacionalidad_id'],
'lugar_nacimiento'=>$item['lugar_nacimiento'],
'genero_id'=>$item['genero_id'],
'estado_civil_id'=>$item['estado_civil_id'],
'profesiones_id'=>$item['profesiones_id'],
'identificador_local'=>$item['identificador_local'],
'fecha_egreso'=>$item['fecha_egreso'],
'reincidente'=>$item['reincidente'],
'curatela'=>$item['curatela'],
'medida_curativa'=>$item['medida_curativa'],
'alojado'=>$item['alojado'],
'jurisdiccion_id'=>$item['jurisdiccion_id'],
'procesos_pendientes'=>$item['procesos_pendientes'],
'situacion_legal_id'=>$item['situacion_legal_id'],
'observaciones'=>$item['observaciones'],
'causa_existente_id'=>$item['causa_existente_id'],
'created_at'=>$item['created_at'],
'updated_at'=>$item['updated_at'],
'deleted_at'=>$item['deleted_at'],

        ];
    }
}