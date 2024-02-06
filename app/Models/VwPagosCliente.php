<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class VwPagosCliente
 * 
 * @property string $nombre
 * @property string $name
 * @property float|null $value
 * @property string $color
 *
 * @package App\Models
 */
class VwPagosCliente extends Model
{
	protected $table = 'vw_pagos_clientes';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'value' => 'float'
	];

	protected $fillable = [
		'nombre',
		'name',
		'value',
		'color'
	];
}
