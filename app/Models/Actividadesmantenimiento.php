<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Actividadesmantenimiento
 * 
 * @property int $IdActividad
 * @property string $NombreActividad
 * 
 * @property Collection|Tiposmantenimientosdetalle[] $tiposmantenimientosdetalles
 * @property Collection|Ventasserviciodetallemantenimiento[] $ventasserviciodetallemantenimientos
 *
 * @package App\Models
 */
class Actividadesmantenimiento extends Model
{
	protected $table = 'actividadesmantenimiento';
	protected $primaryKey = 'IdActividad';
	public $timestamps = false;

	protected $fillable = [
		'NombreActividad'
	];

	public function tiposmantenimientosdetalles()
	{
		return $this->hasMany(Tiposmantenimientosdetalle::class, 'IdActividad');
	}

	public function ventasserviciodetallemantenimientos()
	{
		return $this->hasMany(Ventasserviciodetallemantenimiento::class, 'IdActividad');
	}
}
