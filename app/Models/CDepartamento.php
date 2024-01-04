<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class CDepartamento
 * 
 * @property int $id
 * @property string|null $departamento
 * 
 * @property Collection|CMunicipio[] $c_municipios
 *
 * @package App\Models
 */
class CDepartamento extends Model
{
	protected $table = 'c_departamentos';
	public $timestamps = false;

	protected $fillable = [
		'departamento'
	];

	public function c_municipios()
	{
		return $this->hasMany(CMunicipio::class, 'id_depto');
	}
}
