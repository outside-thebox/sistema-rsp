<?php
/**
 * Created by PhpStorm.
 * User: damian
 * Date: 09/11/16
 * Time: 20:31
 */

namespace App\Api\Repositories;


use App\Api\Entities\Mysql\IngresosCausasExistentes;

class RepoIngresoCausaExistente {

    function save($ingreso_id,$causas_existentes)
    {
        $array_causas_existentes = explode(",",$causas_existentes);
        $data['ingreso_id'] = $ingreso_id;
        foreach($array_causas_existentes as $causa_existente_id)
        {
                $data = [];
                $data['ingreso_id'] = $ingreso_id;
                $data['causa_existente_id'] = $causa_existente_id;
//                $model = new IngresosCausasExistentes($data);
                $model = new IngresosCausasExistentes();
                $model = $model->firstOrNew(['ingreso_id' => $ingreso_id,'causa_existente_id' => $causa_existente_id]);
//                dd($model);
                $model->save();
        }
    }
} 