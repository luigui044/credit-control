<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class VwDetaInformeCredito
 * 
 * @property int $id
 * @property int $id_transaccion
 * @property string|null $no_recibo
 * @property Carbon $fecha
 * @property float $monto
 * @property float|null $monto_mora
 * @property Carbon|null $fecha_cuota
 *
 * @package App\Models
 */
class VwDetaInformeCredito extends Model
{
	protected $table = 'vw_deta_informe_creditos';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id' => 'int',
		'id_transaccion' => 'int',
		'fecha' => 'datetime',
		'monto' => 'float',
		'monto_mora' => 'float',
		'fecha_cuota' => 'datetime'
	];

	protected $fillable = [
		'id',
		'id_transaccion',
		'no_recibo',
		'fecha',
		'monto',
		'monto_mora',
		'fecha_cuota'
	];
}
