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
            'fecha_ingreso' => 'required'
        ];
    }

    public function getMessages()
    {
        return [
        ];
    }


}