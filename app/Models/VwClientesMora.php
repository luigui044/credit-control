<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class VwClientesMora
 * 
 * @property string $no_credito
 * @property Carbon|null $ulima_cuota_pagada
 * @property Carbon|null $ultima_cuota
 * @property int|null $cuotas_pendiente
 *
 * @package App\Models
 */
class VwClientesMora extends Model
{
	protected $table = 'vw_clientes_mora';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'ulima_cuota_pagada' => 'datetime',
		'ultima_cuota' => 'datetime',
		'cuotas_pendiente' => 'int'
	];

	protected $fillable = [
		'no_credito',
		'ulima_cuota_pagada',
		'ultima_cuota',
		'cuotas_pendiente'
	];
}
