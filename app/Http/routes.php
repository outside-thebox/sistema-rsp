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

use Illuminate\Support\Facades\Input;

Route::get('/', function () {
    return view('welcome');
});

Route::auth();


Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', 'HomeController@index');
    Route::get('ingresos/show/{ingresos}',['as'=>'ingresos.show','uses'=>'IngresosController@show']);
    Route::get('ingresos/{ingresos}/exportarPDF',['as'=>'ingresos.exportarPDF','uses'=>'IngresosController@exportarPDF']);
    Route::resource('ingresos','IngresosController');

    Route::get('files/descargar',array('as'=>'archivos.descargar','uses'=>function(){
        $path = Input::get('q');
        return Response::download($path);
    }));

});


Route::group(['prefix' => 'api'], function () {
    Route::group(['prefix' => 'v1'], function () {
        Route::resource('causas_existentes','Api\Mysql\CausasExistentesController');
        Route::resource('estados_civiles','Api\Mysql\EstadosCivilesController');
        Route::resource('generos','Api\Mysql\GenerosController');
        Route::resource('ingresos','Api\Mysql\IngresosController');
        Route::resource('jurisdicciones','Api\Mysql\JurisdiccionesController');
        Route::resource('nacionalidades','Api\Mysql\NacionalidadesController');
        Route::resource('profesiones','Api\Mysql\ProfesionesController');
        Route::resource('situaciones_legales','Api\Mysql\SituacionesLegalesController');
        Route::resource('tipos_documentos','Api\Mysql\TiposDocumentosController');
    });
});Route::resource('ingresos_fotos','Api\Mysql\IngresosFotosController'); 
Route::resource('ingresos_causas_existentes','Api\Mysql\IngresosCausasExistentesController'); 
