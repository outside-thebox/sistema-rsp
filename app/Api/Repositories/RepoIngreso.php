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
//        dd($data);
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






    }


}