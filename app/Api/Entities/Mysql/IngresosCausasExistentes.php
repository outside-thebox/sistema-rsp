<?php namespace App\Api\Entities\Mysql;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use JuaGuz\ApiGenerator\ApiModelInterface;

class IngresosCausasExistentes extends Model implements ApiModelInterface{
	use SoftDeletes;
	protected $primaryKey = "id";
	protected $fillable = ['id','ingreso_id','causa_existente_id','foto','created_at','updated_at','deleted_at',];
	protected $dates = ['deleted_at'];
	protected $table = 'ingresos_causas_existentes';
	protected $connection = 'mysql';

		
	public function getRules(){
		return [];
	}
    public function getErrorMessage(){
    	return [];
    }

    public function causa_existente()
    {
        return $this->hasOne('App\Api\Entities\Mysql\CausasExistentes', 'id', 'causa_existente_id');
    }


}
