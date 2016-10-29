<?php
/**
 * Created by PhpStorm.
 * User: damian
 * Date: 08/10/16
 * Time: 19:28
 */

namespace App\Http\Controllers;



use App\Api\Entities\Mysql\Ingresos;
use App\Api\Repositories\RepoIngreso;
use Barryvdh\DomPDF\Facade as PDF;
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
        $accion = "Agregar";
        return \View::make($this->view."formulario",compact('form_data','accion'));
    }

    public function store()
    {
        $data = Input::all();
//        dd($data);
        $repoIngreso = new RepoIngreso($data);
        $validacion = $repoIngreso->ValidarDatos();
        if($validacion === true)
        {
            $id = $repoIngreso->guardar();
            return route($this->view.'index');
        }
        else
            return $validacion;
    }

    public function show(Ingresos $ingresos)
    {
        $ingreso = $ingresos;
        return \View::make($this->view."show",compact('ingreso'));
    }

    public function edit($id)
    {
//        dd($this->repoIngreso);
        $ingreso = $this->repoIngreso->getModel()->find($id);
        $form_data = ['route' => [$this->view.'store'], 'method' => 'POST','enctype' => 'multipart/form-data','id' => 'frmIngreso'];
        $accion = "Editar";
        return \View::Make($this->view.'formulario',compact("form_data","action","ingreso","accion"));    }

    public function exportarPDF(Ingresos $ingresos)
    {
        $ingreso = $ingresos;
        $ban = true;
        $pdf = PDF::loadView('ingresos.PDF', compact("ingreso","ban"));
        return $pdf->download("Ingreso.pdf");




    }


}