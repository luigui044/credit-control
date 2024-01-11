<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TCredito
 * 
 * @property int $id_credito
 * @property int|null $id_cliente
 * @property int|null $id_casa
 * @property float|null $monto_total
 * @property float|null $saldo_restante
 * @property Carbon|null $fecha_inicio
 * @property Carbon|null $fecha_fin
 * @property float|null $tasa_interes_anual
 * @property bool|null $seguro_deuda
 * @property float|null $costo_seguro
 * @property float|null $prima
 * 
 * @property TCliente|null $t_cliente
 * @property TCasa|null $t_casa
 * @property Collection|TTransaccione[] $t_transacciones
 *
 * @package App\Models
 */
class TCredito extends Model
{
	protected $table = 't_creditos';
	protected $primaryKey = 'id_credito';
	public $timestamps = false;

	protected $casts = [
		'id_cliente' => 'int',
		'id_casa' => 'int',
		'monto_total' => 'float',
		'saldo_restante' => 'float',
		'fecha_inicio' => 'datetime',
		'fecha_fin' => 'datetime',
		'tasa_interes_anual' => 'float',
		'seguro_deuda' => 'bool',
		'costo_seguro' => 'float',
		'prima' => 'float'
	];

	protected $fillable = [
		'id_cliente',
		'id_casa',
		'monto_total',
		'saldo_restante',
		'fecha_inicio',
		'fecha_fin',
		'tasa_interes_anual',
		'seguro_deuda',
		'costo_seguro',
		'prima'
	];

	public function t_cliente()
	{
		return $this->belongsTo(TCliente::class, 'id_cliente');
	}

	public function t_casa()
	{
		return $this->belongsTo(TCasa::class, 'id_casa');
	}

	public function t_transacciones()
	{
		return $this->hasMany(TTransaccione::class, 'id_credito');
	}
}
