<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class CMunicipio
 * 
 * @property int $id
 * @property int $id_depto
 * @property string $municipio
 * 
 * @property CDepartamento $c_departamento
 *
 * @package App\Models
 */
class CMunicipio extends Model
{
	protected $table = 'c_municipios';
	public $timestamps = false;

	protected $casts = [
		'id_depto' => 'int'
	];

	protected $fillable = [
		'id_depto',
		'municipio'
	];

	public function c_departamento()
	{
		return $this->belongsTo(CDepartamento::class, 'id_depto');
	}
}
