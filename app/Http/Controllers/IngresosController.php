<?php
/**
 * Created by PhpStorm.
 * User: damian
 * Date: 08/10/16
 * Time: 19:28
 */

namespace App\Http\Controllers;



use App\Api\Repositories\RepoIngreso;
use Illuminate\Support\Facades\Input;


class IngresosController extends Controller
{

    private $repoIngreso;
    private $view;

    public function __construct(RepoIngreso $repoIngreso)
    {
        $this->view = "ingresos.";
        $this->repoIngreso = $repoIngreso;
    }

    public function index()
    {
        return \View::make($this->view."index");
    }

    public function create()
    {
        $form_data = ['route' => [$this->view.'store'], 'method' => 'POST','enctype' => 'multipart/form-data','id' => 'frmIngreso'];
        return \View::make($this->view."formulario",compact('form_data'));
    }

    public function store()
    {
        $data = Input::all();
        $repoIngreso = new RepoIngreso($data);
        $validacion = $repoIngreso->ValidarDatos();
//        dd($validacion);
        if($validacion === true)
            return $repoIngreso->guardar();
        else
            return $validacion;
    }


}