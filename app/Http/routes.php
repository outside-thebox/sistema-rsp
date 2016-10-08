<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');
Route::resource('causas_existentes','Api\Mysql\CausasExistentesController'); 
Route::resource('estados_civiles','Api\Mysql\EstadosCivilesController'); 
Route::resource('generos','Api\Mysql\GenerosController'); 
Route::resource('ingresos','Api\Mysql\IngresosController'); 
Route::resource('jurisdicciones','Api\Mysql\JurisdiccionesController'); 
Route::resource('nacionalidades','Api\Mysql\NacionalidadesController'); 
Route::resource('profesiones','Api\Mysql\ProfesionesController'); 
Route::resource('situaciones_legales','Api\Mysql\SituacionesLegalesController'); 
Route::resource('tipos_documentos','Api\Mysql\TiposDocumentosController'); 
