<?php namespace App\Api\Transformers;
use JuaGuz\ApiGenerator\BaseTransformer;
class CausasExistentesTransformer extends BaseTransformer
{

    /**
     * @param $item
     * @return array
     */
    public function transform($item)
    {
        return  [
            'id'=>$item['id'],
'desripcion'=>$item['desripcion'],
'created_at'=>$item['created_at'],
'updated_at'=>$item['updated_at'],
'deleted_at'=>$item['deleted_at'],

        ];
    }
}