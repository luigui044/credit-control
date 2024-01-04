<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class VwCasa
 * 
 * @property string $direccion
 * @property float $precio
 * @property string $descripcion
 * @property string $estado
 *
 * @package App\Models
 */
class VwCasa extends Model
{
	protected $table = 'vw_casas';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'precio' => 'float'
	];

	protected $fillable = [
		'direccion',
		'precio',
		'descripcion',
		'estado'
	];
}
