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
 * @property int $id_cliente
 * @property int $tipo_transaccion
 * @property float $monto
 * @property Carbon $fecha
 * @property int|null $mora_aplicada
 * @property float|null $monto_mora
 * @property Carbon|null $fecha_mora
 * 
 * @property TCliente $t_cliente
 * @property TCredito $t_credito
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
		'id_cliente' => 'int',
		'tipo_transaccion' => 'int',
		'monto' => 'float',
		'fecha' => 'datetime',
		'mora_aplicada' => 'int',
		'monto_mora' => 'float',
		'fecha_mora' => 'datetime'
	];

	protected $fillable = [
		'id_credito',
		'id_cliente',
		'tipo_transaccion',
		'monto',
		'fecha',
		'mora_aplicada',
		'monto_mora',
		'fecha_mora'
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
