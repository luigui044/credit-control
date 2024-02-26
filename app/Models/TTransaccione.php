<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TTransaccione
 * 
 * @property int $id_transaccion
 * @property int $id_credito
 * @property string $tipo_transaccion
 * @property float $monto
 * @property Carbon $fecha
 * @property int|null $mora_aplicada
 * @property float|null $monto_mora
 * @property Carbon|null $fecha_cuota
 * @property int $estado
 * @property string|null $no_recibo
 * @property float|null $saldo_favor
 * 
 * @property TCredito $t_credito
 * @property CEstadosCredito $c_estados_credito
 *
 * @package App\Models
 */
class TTransaccione extends Model
{
	protected $table = 't_transacciones';
	protected $primaryKey = 'id_transaccion';
	public $timestamps = false;

	protected $casts = [
		'id_credito' => 'int',
		'monto' => 'float',
		'fecha' => 'datetime',
		'mora_aplicada' => 'int',
		'monto_mora' => 'float',
		'fecha_cuota' => 'datetime',
		'estado' => 'int',
		'saldo_favor' => 'float'
	];

	protected $fillable = [
		'id_credito',
		'tipo_transaccion',
		'monto',
		'fecha',
		'mora_aplicada',
		'monto_mora',
		'fecha_cuota',
		'estado',
		'no_recibo',
		'saldo_favor'
	];

	public function t_credito()
	{
		return $this->belongsTo(TCredito::class, 'id_credito');
	}

	public function c_estados_credito()
	{
		return $this->belongsTo(CEstadosCredito::class, 'estado');
	}
}
