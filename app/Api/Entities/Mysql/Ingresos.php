<?php namespace App\Api\Entities\Mysql;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use JuaGuz\ApiGenerator\ApiModelInterface;

class Ingresos extends Model implements ApiModelInterface{
	use SoftDeletes;
	protected $primaryKey = "id";
	protected $fillable = ['id','fecha_ingreso','apellido_declarado','nombre_declarado','fecha_nacimiento','tipo_documento_declarado_id','nro_documento_declarado','origen_documento_declarado','apellido_real','nombre_real','tipo_documento_real_id','nro_documento_real','origen_documento_real','otros_nombres','alias','nacionalidad_id','lugar_nacimiento','genero_id','estado_civil_id','profesiones_id','identificador_local','fecha_egreso','reincidente','curatela','medida_curativa','alojado','jurisdiccion_id','procesos_pendientes','situacion_legal_id','observaciones','causa_existente_id','created_at','updated_at','deleted_at',];
	protected $dates = ['deleted_at'];
	protected $table = 'ingresos';
	protected $connection = 'mysql';

		
	public function getRules(){
		return [];
	}
    public function getErrorMessage(){
    	return [];
    }

	public function tipo_documento_declarado()
	{
		return $this->hasOne('App\Api\Entities\Mysql\TiposDocumentos', 'tipo_documento_declarado_id', 'id');
	}

	public function tipo_documento_real()
	{
		return $this->hasOne('App\Api\Entities\Mysql\TiposDocumentos', 'tipo_documento_real_id', 'id');
	}

	public function nacionalidad()
	{
		return $this->hasOne('App\Api\Entities\Mysql\Nacionalidades', 'nacionalidad_id', 'id');
	}

	public function genero()
	{
		return $this->hasOne('App\Api\Entities\Mysql\Generos', 'genero_id', 'id');
	}

	public function estado_civil()
	{
		return $this->hasOne('App\Api\Entities\Mysql\EstadosCiviles', 'estado_civil_id', 'id');
	}

	public function profesion()
	{
		return $this->hasOne('App\Api\Entities\Mysql\Profesiones', 'profesion_id', 'id');
	}

	public function jurisdiccion()
	{
		return $this->hasOne('App\Api\Entities\Mysql\Jurisdicciones', 'jurisdiccion_id', 'id');
	}

	public function situacion_legal()
	{
		return $this->hasOne('App\Api\Entities\Mysql\SituacionesLegales', 'situacion_legal_id', 'id');
	}

	public function causa_existente()
	{
		return $this->hasOne('App\Api\Entities\Mysql\CausasExistentes', 'causa_existente_id', 'id');
	}


}
