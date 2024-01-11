<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TCliente
 * 
 * @property int $id_cliente
 * @property string $nombre
 * @property int $edad
 * @property string $dui
 * @property string $oficio
 * @property string $correo
 * @property string $telefono
 * @property string $direccion
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @package App\Models
 */
class TCliente extends Model
{
	protected $table = 't_clientes';
	protected $primaryKey = 'id_cliente';

	protected $casts = [
		'edad' => 'int'
	];

	protected $fillable = [
		'nombre',
		'edad',
		'dui',
		'oficio',
		'correo',
		'telefono',
		'direccion'
	];
}
