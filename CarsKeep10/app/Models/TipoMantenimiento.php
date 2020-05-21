<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TipoMantenimiento
 * 
 * @property int $IdTipoMantenimiento
 * @property string $NombreMantenimiento
 * @property string $Descripcion
 * @property float $LimiteInferiorKilometraje
 * @property float $LimiteSuperiorKilometraje
 * 
 * @property Collection|TipoMantenimientoDetalle[] $tiposmantenimientosdetalles
 *
 * @package App\Models
 */
class TipoMantenimiento extends Model
{
	protected $table = 'tiposmantenimientos';
	protected $primaryKey = 'IdTipoMantenimiento';

	public $timestamps = false;

	protected $casts = [
		'IdTipoMantenimiento' => 'int',
		'LimiteInferiorKilometraje' => 'float',
		'LimiteSuperiorKilometraje' => 'float'
	];

	protected $fillable = [
		'NombreMantenimiento',
		'Descripcion',
		'LimiteInferiorKilometraje',
		'LimiteSuperiorKilometraje'
	];

	public function tiposmantenimientosdetalles()
	{
		return $this->hasMany(TipoMantenimientoDetalle::class, 'IdTipoMantenimiento');
	}

    public function actividadesmantenimiento()
    {
        return $this->belongsToMany(ActividadMantenimiento::class, 'TiposMantenimientosDetalle', 'IdTipoMantenimiento', 'IdActividad')->withPivot('Obligatorio','CostoServicio');
    }
}
