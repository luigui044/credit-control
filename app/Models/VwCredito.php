<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class VwCredito
 * 
 * @property string $nombre
 * @property int $id_credito
 * @property int $no_contrato
 * @property string $no_credito
 * @property int $id_casa
 * @property int $id_cliente
 * @property float $precio_casa
 * @property float $prima
 * @property float $saldo_restante
 * @property float $tasa_interes_anual
 * @property float $monto_total
 * @property int $tiempo_total
 * @property Carbon|null $fecha_inicio
 * @property Carbon|null $fecha_fin
 * @property bool $seguro_deuda
 * @property float|null $costo_seguro
 * @property float|null $cuota_mensual
 * @property float $cuota_mensual_real
 * @property float $gasto_admin
 * @property float $interes_mensual
 * @property int $meses
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @package App\Models
 */
class VwCredito extends Model
{
	protected $table = 'vw_creditos';
	public $incrementing = false;

	protected $casts = [
		'id_credito' => 'int',
		'no_contrato' => 'int',
		'id_casa' => 'int',
		'id_cliente' => 'int',
		'precio_casa' => 'float',
		'prima' => 'float',
		'saldo_restante' => 'float',
		'tasa_interes_anual' => 'float',
		'monto_total' => 'float',
		'tiempo_total' => 'int',
		'fecha_inicio' => 'datetime',
		'fecha_fin' => 'datetime',
		'seguro_deuda' => 'bool',
		'costo_seguro' => 'float',
		'cuota_mensual' => 'float',
		'cuota_mensual_real' => 'float',
		'gasto_admin' => 'float',
		'interes_mensual' => 'float',
		'meses' => 'int'
	];

	protected $fillable = [
		'nombre',
		'id_credito',
		'no_contrato',
		'no_credito',
		'id_casa',
		'id_cliente',
		'precio_casa',
		'prima',
		'saldo_restante',
		'tasa_interes_anual',
		'monto_total',
		'tiempo_total',
		'fecha_inicio',
		'fecha_fin',
		'seguro_deuda',
		'costo_seguro',
		'cuota_mensual',
		'cuota_mensual_real',
		'gasto_admin',
		'interes_mensual',
		'meses'
	];
}
