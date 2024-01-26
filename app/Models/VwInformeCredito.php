<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class VwInformeCredito
 * 
 * @property int $id
 * @property string $no_credito
 * @property string $nombre
 * @property int $edad
 * @property string $dui
 * @property string|null $correo
 * @property string|null $telefono
 * @property string|null $direccion
 * @property string $municipio
 * @property string|null $departamento
 * @property float $precio_casa
 * @property float $prima
 * @property float $saldo_restante
 * @property Carbon|null $fecha_inicio
 * @property Carbon|null $fecha_fin
 *
 * @package App\Models
 */
class VwInformeCredito extends Model
{
	protected $table = 'vw_informe_creditos';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id' => 'int',
		'edad' => 'int',
		'precio_casa' => 'float',
		'prima' => 'float',
		'saldo_restante' => 'float',
		'fecha_inicio' => 'datetime',
		'fecha_fin' => 'datetime'
	];

	protected $fillable = [
		'id',
		'no_credito',
		'nombre',
		'edad',
		'dui',
		'correo',
		'telefono',
		'direccion',
		'municipio',
		'departamento',
		'precio_casa',
		'prima',
		'saldo_restante',
		'fecha_inicio',
		'fecha_fin'
	];
}
