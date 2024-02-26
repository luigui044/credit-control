<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TPagosUnico
 * 
 * @property int $id
 * @property string $desc_pago
 * @property string|null $no_recibo
 * @property float $monto
 * @property float $mora
 * @property float $total
 * @property float|null $restante
 * @property Carbon $fecha_vencimiento
 * @property int $id_cliente
 * @property int $id_credito
 * @property int $estado
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property TCliente $t_cliente
 * @property TCredito $t_credito
 *
 * @package App\Models
 */
class TPagosUnico extends Model
{
	protected $table = 't_pagos_unicos';

	protected $casts = [
		'monto' => 'float',
		'mora' => 'float',
		'total' => 'float',
		'restante' => 'float',
		'fecha_vencimiento' => 'datetime',
		'id_cliente' => 'int',
		'id_credito' => 'int',
		'estado' => 'int'
	];

	protected $fillable = [
		'desc_pago',
		'no_recibo',
		'monto',
		'mora',
		'total',
		'restante',
		'fecha_vencimiento',
		'id_cliente',
		'id_credito',
		'estado'
	];

	public function t_cliente()
	{
		return $this->belongsTo(TCliente::class, 'id_cliente');
	}

	public function t_credito()
	{
		return $this->belongsTo(TCredito::class, 'id_credito');
	}
}
