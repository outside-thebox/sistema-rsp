<?php namespace App\Api\Transformers;
use JuaGuz\ApiGenerator\BaseTransformer;
class IngresosCausasExistentesTransformer extends BaseTransformer
{

    /**
     * @param $item
     * @return array
     */
    public function transform($item)
    {
        return  [
            'id'=>$item['id'],
'ingreso_id'=>$item['ingreso_id'],
'causa_existente_id'=>$item['causa_existente_id'],
'foto'=>$item['foto'],
'created_at'=>$item['created_at'],
'updated_at'=>$item['updated_at'],
'deleted_at'=>$item['deleted_at'],

        ];
    }
}