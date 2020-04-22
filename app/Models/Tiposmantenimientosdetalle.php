<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Tiposmantenimientosdetalle
 * 
 * @property int $IdTipoMantenimiento
 * @property int $IdActividad
 * @property string $Obligatorio
 * @property float $CostoServicio
 * 
 * @property Tiposmantenimiento $tiposmantenimiento
 * @property Actividadesmantenimiento $actividadesmantenimiento
 * @property Collection|Articulo[] $articulos
 *
 * @package App\Models
 */
class Tiposmantenimientosdetalle extends Model
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
		return $this->belongsTo(Tiposmantenimiento::class, 'IdTipoMantenimiento');
	}

	public function actividadesmantenimiento()
	{
		return $this->belongsTo(Actividadesmantenimiento::class, 'IdActividad');
	}

	public function articulos()
	{
		return $this->belongsToMany(Articulo::class, 'tiposmantenimientosdetallearticulos', 'IdTipoMantenimiento', 'IdArticulo')
					->withPivot('IdActividad');
	}
}
