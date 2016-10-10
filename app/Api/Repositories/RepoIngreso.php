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

        return $data;
    }

    public function guardar()
    {
        $data = $this->prepareData($this->data);
        $manager = new ManagerIngreso($this->getModel(),$data);
        $manager->save();
        $id = $manager->getEntity()->id;
        $this->postSave($id,$data);
        return $id;
    }

    private function postSave($id,$data)
    {

    }


}