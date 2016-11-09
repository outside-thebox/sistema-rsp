<?php namespace App\Http\Controllers\Api\Mysql;

use App\Api\Entities\Mysql\IngresosCausasExistentes as Model;
use App\Api\Transformers\IngresosCausasExistentesTransformer as Transformer;
use JuaGuz\ApiGenerator\Api;


class IngresosCausasExistentesController extends Api
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

    
}

