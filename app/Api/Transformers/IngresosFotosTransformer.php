<?php namespace App\Api\Transformers;
use JuaGuz\ApiGenerator\BaseTransformer;
class IngresosFotosTransformer extends BaseTransformer
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
'foto'=>$item['foto'],
'created_at'=>$item['created_at'],
'updated_at'=>$item['updated_at'],
'deleted_at'=>$item['deleted_at'],

        ];
    }
}