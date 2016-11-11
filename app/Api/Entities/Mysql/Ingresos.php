<?php namespace App\Api\Entities\Mysql;

use App\Api\Helpers\FunctionsSpecials;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use JuaGuz\ApiGenerator\ApiModelInterface;

class Ingresos extends Model implements ApiModelInterface{
	use SoftDeletes;
	protected $primaryKey = "id";
	protected $fillable = ['id','fecha_ingreso','apellido_declarado','nombre_declarado','fecha_nacimiento','tipo_documento_declarado_id','nro_documento_declarado','origen_documento_declarado','apellido_real','nombre_real','tipo_documento_real_id','nro_documento_real','origen_documento_real','otros_nombres','alias','nacionalidad_id','lugar_nacimiento','genero_id','estado_civil_id','profesion_id','identificador_local','fecha_egreso','reincidente','curatela','medida_curativa','alojado','jurisdiccion_id','procesos_pendientes','situacion_legal_id','observaciones','causa_existente_id','created_at','updated_at','deleted_at',];
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
		return $this->hasOne('App\Api\Entities\Mysql\TiposDocumentos', 'id', 'tipo_documento_declarado_id');
	}

	public function tipo_documento_real()
	{
		return $this->hasOne('App\Api\Entities\Mysql\TiposDocumentos', 'id', 'tipo_documento_real_id');
	}

	public function nacionalidad()
	{
		return $this->hasOne('App\Api\Entities\Mysql\Nacionalidades', 'id', 'nacionalidad_id');
	}

	public function genero()
	{
		return $this->hasOne('App\Api\Entities\Mysql\Generos', 'id', 'genero_id');
	}

	public function estado_civil()
	{
		return $this->hasOne('App\Api\Entities\Mysql\EstadosCiviles', 'id', 'estado_civil_id');
	}

	public function profesion()
	{
		return $this->hasOne('App\Api\Entities\Mysql\Profesiones', 'id', 'profesion_id');
	}

	public function jurisdiccion()
	{
		return $this->hasOne('App\Api\Entities\Mysql\Jurisdicciones', 'id', 'jurisdiccion_id');
	}

	public function situacion_legal()
	{
		return $this->hasOne('App\Api\Entities\Mysql\SituacionesLegales', 'id', 'situacion_legal_id');
	}



	public function getFechaNacimientoAttribute()
	{
		return FunctionsSpecials::DateMysqlToNormal($this->attributes['fecha_nacimiento']);
	}

	public function getFechaIngresoAttribute()
	{
		return FunctionsSpecials::DateMysqlToNormal($this->attributes['fecha_ingreso']);
	}

	public function getFechaEgresoAttribute()
	{
		return FunctionsSpecials::DateMysqlToNormal($this->attributes['fecha_egreso']);
	}

	public function ingresos_fotos()
	{
		return $this->hasMany('App\Api\Entities\Mysql\IngresosFotos', 'ingreso_id', 'id');
	}

    public function causas_existentes()
    {
        return $this->hasMany('App\Api\Entities\Mysql\IngresosCausasExistentes', 'ingreso_id', 'id');
    }

    public function ids_causas_existentes()
    {
        $list = $this->hasMany('App\Api\Entities\Mysql\IngresosCausasExistentes', 'ingreso_id', 'id');
        $mensaje = "";
        foreach($list as $l)
        {
            $mensaje .= "Hola";
        }
        return $mensaje;
    }

}
