<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Tiposmantenimientosdetallearticulo
 * 
 * @property int $IdTipoMantenimiento
 * @property int $IdActividad
 * @property int $IdArticulo
 * 
 * @property Tiposmantenimientosdetalle $tiposmantenimientosdetalle
 * @property Articulo $articulo
 *
 * @package App\Models
 */
class Tiposmantenimientosdetallearticulo extends Model
{
	protected $table = 'tiposmantenimientosdetallearticulos';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'IdTipoMantenimiento' => 'int',
		'IdActividad' => 'int',
		'IdArticulo' => 'int'
	];

	public function tiposmantenimientosdetalle()
	{
		return $this->belongsTo(Tiposmantenimientosdetalle::class, 'IdTipoMantenimiento')
					->where('tiposmantenimientosdetalle.IdTipoMantenimiento', '=', 'tiposmantenimientosdetallearticulos.IdTipoMantenimiento')
					->where('tiposmantenimientosdetalle.IdActividad', '=', 'tiposmantenimientosdetallearticulos.IdActividad');
	}

	public function articulo()
	{
		return $this->belongsTo(Articulo::class, 'IdArticulo');
	}
}
