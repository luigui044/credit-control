<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class VwCobrosUnico
 * 
 * @property string $nombre
 * @property string $no_credito
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
 * @package App\Models
 */
class VwCobrosUnico extends Model
{
	protected $table = 'vw_cobros_unicos';
	public $incrementing = false;

	protected $casts = [
		'id' => 'int',
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
		'nombre',
		'no_credito',
		'id',
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
}
