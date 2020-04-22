<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Tiposmantenimiento
 * 
 * @property int $IdTipoMantenimiento
 * @property string $NombreMantenimiento
 * @property string $Descripcion
 * @property float $LimiteInferiorKilometraje
 * @property float $LimiteSuperiorKilometraje
 * 
 * @property Collection|Tiposmantenimientosdetalle[] $tiposmantenimientosdetalles
 *
 * @package App\Models
 */
class Tiposmantenimiento extends Model
{
	protected $table = 'tiposmantenimientos';
	protected $primaryKey = 'IdTipoMantenimiento';
	public $incrementing = false;
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
		return $this->hasMany(Tiposmantenimientosdetalle::class, 'IdTipoMantenimiento');
	}
}
