<?php namespace App\Http\Controllers\Api\Mysql;

use App\Api\Entities\Mysql\Generos as Model;
use App\Api\Transformers\GenerosTransformer as Transformer;
use JuaGuz\ApiGenerator\Api;


class GenerosController extends Api
{
    protected $model;
    protected $tranformer;
    public function __construct(Model $model,Transformer $transformer)
    {
        parent::__construct($model,$transformer);
        
    }

    public function getRelacionesValidas(){
        return [];
    }

    function getValidRelations()
    {
        // TODO: Implement getValidRelations() method.
    }



}

