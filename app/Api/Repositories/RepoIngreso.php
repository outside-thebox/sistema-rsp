<?php
/**
 * Created by PhpStorm.
 * User: damian
 * Date: 08/10/16
 * Time: 19:35
 */

namespace App\Api\Repositories;


use App\Api\Entities\Mysql\Ingresos;
use App\Api\Helpers\FunctionsSpecials;
use App\Api\Manager\ManagerIngreso;

class RepoIngreso extends RepoBase
{
    private $data;

    public function __construct($data = [])
    {
        $this->data = $data;
    }

    public function getModel()
    {
        return new Ingresos();
    }

    private function getRepoIngresoFotos()
    {
        return new RepoIngresosFotos();
    }

    private function getRepoIngresoCausaExistente()
    {
        return new RepoIngresoCausaExistente();
    }

    public function ValidarDatos()
    {
        $manager = new ManagerIngreso($this->getModel(),$this->data);
        $isValid = $manager->isValid();
        if(!$isValid)
            return $manager->mostrarErrores($isValid);

        return $manager->isValid();
    }

    private function prepareData($data)
    {
        if($data['tipo_documento_declarado_id'] == 0)
            unset($data['tipo_documento_declarado_id']);

        if($data['tipo_documento_real_id'] == 0)
            unset($data['tipo_documento_real_id']);

        if($data['nacionalidad_id'] == 0)
            unset($data['nacionalidad_id']);

        if($data['genero_id'] == 0)
            unset($data['genero_id']);

        if($data['estado_civil_id'] == 0)
            unset($data['estado_civil_id']);

        if($data['profesion_id'] == 0)
            unset($data['profesion_id']);

        if($data['jurisdiccion_id'] == 0)
            unset($data['jurisdiccion_id']);

        if($data['situacion_legal_id'] == 0)
            unset($data['situacion_legal_id']);

//        if($data['causa_existente_id'] == 0)
//            unset($data['causa_existente_id']);

        if($data['fecha_ingreso'])
            $data['fecha_ingreso'] = FunctionsSpecials::DateNormalToMysql($this->data['fecha_ingreso']);

        if($data['fecha_nacimiento'])
            $data['fecha_nacimiento'] = FunctionsSpecials::DateNormalToMysql($this->data['fecha_nacimiento']);

        if($data['fecha_egreso'])
            $data['fecha_egreso'] = FunctionsSpecials::DateNormalToMysql($this->data['fecha_egreso']);

        if(!isset($data['reincidente']))
            $data['reincidente'] = 0;

        if(!isset($data['curatela']))
            $data['curatela'] = 0;

        if(!isset($data['medida_curativa']))
            $data['medida_curativa'] = 0;

        if(!isset($data['alojado']))
            $data['alojado'] = 0;

        if(!isset($data['procesos_pendientes']))
            $data['procesos_pendientes'] = 0;

        return $data;
    }

    public function guardar()
    {
        $data = $this->prepareData($this->data);
//        dd($this->getModel()->firstOrNew(["id"=>$data['id']]));
        $manager = new ManagerIngreso($this->getModel()->firstOrNew(["id"=>$data['id']]),$data);
        $manager->save();
        $id = $manager->getEntity()->id;
        $this->postSave($id,$data);
        return $id;
    }

    private function postSave($id,$data)
    {
        if(isset($data['foto']['archivos']))
            $this->getRepoIngresoFotos()->save($id,$data['foto']['archivos']);
        if($data['causa_existente_id'] != "null")
        {
//            dd($data);
            $this->getRepoIngresoCausaExistente()->save($id,$data['causa_existente_id']);
        }
    }

    public function darImagenes($ingresos_fotos)
    {
        $array = [];
        foreach($ingresos_fotos as $foto)
        {
            array_push($array,FunctionsSpecials::darImagen($foto->foto));
        }
        return $array;
    }


}