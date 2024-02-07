<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TImagenesCasa
 * 
 * @property int $id_casa
 * @property string $img_url
 * @property bool $tipo
 * @property Carbon $created_at
 * @property Carbon $update_at
 * 
 * @property TCasa $t_casa
 *
 * @package App\Models
 */
class TImagenesCasa extends Model
{
	protected $table = 't_imagenes_casas';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id_casa' => 'int',
		'tipo' => 'bool',
		'update_at' => 'datetime'
	];

	protected $fillable = [
		'id_casa',
		'img_url',
		'tipo',
		'update_at'
	];

	public function t_casa()
	{
		return $this->belongsTo(TCasa::class, 'id_casa');
	}
}
