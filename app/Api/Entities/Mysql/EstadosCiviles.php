<?php namespace App\Api\Entities\Mysql;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use JuaGuz\ApiGenerator\ApiModelInterface;

class EstadosCiviles extends Model implements ApiModelInterface{
	use SoftDeletes;
	protected $primaryKey = "id";
	protected $fillable = ['id','desripcion','created_at','updated_at','deleted_at',];
	protected $dates = ['deleted_at'];
	protected $table = 'estados_civiles';
	protected $connection = 'mysql';

		
	public function getRules(){
		return [];
	}
    public function getErrorMessage(){
    	return [];
    }


}
