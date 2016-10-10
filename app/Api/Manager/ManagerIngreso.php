<?php
/**
 * Created by PhpStorm.
 * User: damian
 * Date: 09/10/16
 * Time: 23:33
 */
namespace App\Api\Manager;

class ManagerIngreso extends ManagerBase {

    public function getRules()
    {
        return [
            'fecha_ingreso' => 'required',
            'fecha_nacimiento' => 'required',
            'apellido_declarado' => 'required'
        ];
    }

    public function getMessages()
    {
        return [
        ];
    }


}