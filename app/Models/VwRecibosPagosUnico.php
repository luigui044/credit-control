<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class VwRecibosPagosUnico
 * 
 * @property int $id_credito
 * @property int $id_cliente
 * @property int $id_cobro
 * @property string $desc_pago
 * @property float $monto
 * @property int|null $mora
 * @property float $total
 * @property float|null $restante
 * @property string|null $no_recibo
 * @property int $estado
 * @property int $ban_generado
 * @property Carbon $fecha_pago
 * @property Carbon|null $fecha_cuota
 *
 * @package App\Models
 */
class VwRecibosPagosUnico extends Model
{
	protected $table = 'vw_recibos_pagos_unicos';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id_credito' => 'int',
		'id_cliente' => 'int',
		'id_cobro' => 'int',
		'monto' => 'float',
		'mora' => 'int',
		'total' => 'float',
		'restante' => 'float',
		'estado' => 'int',
		'ban_generado' => 'int',
		'fecha_pago' => 'datetime',
		'fecha_cuota' => 'datetime'
	];

	protected $fillable = [
		'id_credito',
		'id_cliente',
		'id_cobro',
		'desc_pago',
		'monto',
		'mora',
		'total',
		'restante',
		'no_recibo',
		'estado',
		'ban_generado',
		'fecha_pago',
		'fecha_cuota'
	];
}
