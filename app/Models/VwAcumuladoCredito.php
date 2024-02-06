<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class VwAcumuladoCredito
 * 
 * @property float|null $total_valor_casas
 * @property float|null $total_primas
 * @property float|null $total_capital_restante
 *
 * @package App\Models
 */
class VwAcumuladoCredito extends Model
{
	protected $table = 'vw_acumulado_creditos';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'total_valor_casas' => 'float',
		'total_primas' => 'float',
		'total_capital_restante' => 'float'
	];

	protected $fillable = [
		'total_valor_casas',
		'total_primas',
		'total_capital_restante'
	];
}
