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
        return \View::make($this->view."formulario",compact('form_data'));
    }

    public function store()
    {
        $data = Input::all();
//        dd($data);
        $repoIngreso = new RepoIngreso($data);
        $validacion = $repoIngreso->ValidarDatos();
        if($validacion === true)
            return $repoIngreso->guardar();
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
        dd($id);
    }

    public function exportarPDF(Ingresos $ingresos)
    {
        $ingreso = $ingresos;
        /*foreach ($entidad->personalXEntidad as $p)
        {
            $p->personal->cargo_personal = $p->personal->cargo->descripcion;
            $p->personal->tipo_persona = $p->personal->objTipoPersona->descripcion;
            array_push($lista,$p->personal);
        }
        $entidad->personalXEntidad = $lista;
        */

        $pdf = PDF::loadView('ingresos.PDF', compact("ingreso"));
        return $pdf->download("Ingreso.pdf");
    }


}