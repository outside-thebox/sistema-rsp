<?php
/**
 * Created by PhpStorm.
 * User: damian
 * Date: 08/10/16
 * Time: 19:35
 */

namespace App\Api\Repositories;


use App\Api\Entities\Mysql\Ingresos;

class RepoIngreso extends RepoBase
{

    public function getModel()
    {
        return new Ingresos();
    }
}