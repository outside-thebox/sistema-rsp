<?php
/**
 * Created by PhpStorm.
 * User: damian
 * Date: 08/10/16
 * Time: 19:28
 */

namespace App\Http\Controllers;



use App\Api\Repositories\RepoIngreso;

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

    }

    public function create()
    {
        return \View::make($this->view."formulario");
    }

}