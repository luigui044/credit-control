<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TCasa
 * 
 * @property int $id_casa
 * @property string $direccion
 * @property float $precio
 * @property string $descripcion
 * 
 * @property Collection|TCredito[] $t_creditos
 *
 * @package App\Models
 */
class TCasa extends Model
{
	protected $table = 't_casas';
	protected $primaryKey = 'id_casa';
	public $timestamps = false;

	protected $casts = [
		'precio' => 'float'
	];

	protected $fillable = [
		'direccion',
		'precio',
		'descripcion'
	];

	public function t_creditos()
	{
		return $this->hasMany(TCredito::class, 'id_casa');
	}
}
