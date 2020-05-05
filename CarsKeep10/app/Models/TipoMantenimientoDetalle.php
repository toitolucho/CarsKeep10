<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TipoMantenimientoDetalle
 * 
 * @property int $IdTipoMantenimiento
 * @property int $IdActividad
 * @property string $Obligatorio
 * @property float $CostoServicio
 * 
 * @property TipoMantenimiento $tiposmantenimiento
 * @property ActividadMantenimiento $actividadesmantenimiento
 * @property Collection|Articulo[] $articulos
 *
 * @package App\Models
 */
class TipoMantenimientoDetalle extends Model
{
	protected $table = 'tiposmantenimientosdetalle';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'IdTipoMantenimiento' => 'int',
		'IdActividad' => 'int',
		'CostoServicio' => 'float'
	];

	protected $fillable = [
		'Obligatorio',
		'CostoServicio'
	];

	public function tiposmantenimiento()
	{
		return $this->belongsTo(TipoMantenimiento::class, 'IdTipoMantenimiento');
	}

	public function actividadesmantenimiento()
	{
		return $this->belongsTo(ActividadMantenimiento::class, 'IdActividad');
	}

	public function articulos()
	{
		return $this->belongsToMany(Articulo::class, 'tiposmantenimientosdetallearticulos', 'IdTipoMantenimiento', 'IdArticulo')
					->withPivot('IdActividad');
	}
}
