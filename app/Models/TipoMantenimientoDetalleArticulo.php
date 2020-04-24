<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class TipoMantenimientoDetalleArticulo
 * 
 * @property int $IdTipoMantenimiento
 * @property int $IdActividad
 * @property int $IdArticulo
 * 
 * @property TipoMantenimientoDetalle $tiposmantenimientosdetalle
 * @property Articulo $articulo
 *
 * @package App\Models
 */
class TipoMantenimientoDetalleArticulo extends Model
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
		return $this->belongsTo(TipoMantenimientoDetalle::class, 'IdTipoMantenimiento')
					->where('tiposmantenimientosdetalle.IdTipoMantenimiento', '=', 'tiposmantenimientosdetallearticulos.IdTipoMantenimiento')
					->where('tiposmantenimientosdetalle.IdActividad', '=', 'tiposmantenimientosdetallearticulos.IdActividad');
	}

	public function articulo()
	{
		return $this->belongsTo(Articulo::class, 'IdArticulo');
	}
}
