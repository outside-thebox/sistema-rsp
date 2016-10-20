<?php
namespace App\Api\Repositories;


use App\Api\Entities\Mysql\IngresosFotos;

class RepoIngresosFotos {

    function save($ingreso_id,$archivos)
    {
        $data['ingreso_id'] = $ingreso_id;
        $path = "fotos/";
        foreach($archivos as $archivo)
        {
            if ($archivo) {
                $data = [];
                $data['foto'] = $archivo->getClientOriginalName();
                $data['ingreso_id'] = $ingreso_id;
                $model = new IngresosFotos($data);
                $model->save();
                $id = $model->id;
                $archivo->move($path,$id."-".$archivo->getClientOriginalName());
            }

        }
    }

}