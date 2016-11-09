<?php namespace App\Http\Controllers\Api\Mysql;

use App\Api\Entities\Mysql\IngresoCausaExistente as Model;
use App\Api\Transformers\IngresoCausaExistenteTransformer as Transformer;
use JuaGuz\ApiGenerator\Api;


class IngresoCausaExistenteController extends Api
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

