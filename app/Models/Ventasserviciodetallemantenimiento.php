<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Ventasserviciodetallemantenimiento
 * 
 * @property int $IdVentaServicio
 * @property int $IdActividad
 * @property float $Costo
 * @property string $CodigoEstadoEjecucion
 * @property string $Observacion
 * 
 * @property VentaServicio $ventasservicio
 * @property ActividadMantenimiento $actividadesmantenimiento
 *
 * @package App\Models
 */
class Ventasserviciodetallemantenimiento extends Model
{
	protected $table = 'ventasserviciodetallemantenimiento';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'IdVentaServicio' => 'int',
		'IdActividad' => 'int',
		'Costo' => 'float'
	];

	protected $fillable = [
		'Costo',
		'CodigoEstadoEjecucion',
		'Observacion'
	];

	public function ventasservicio()
	{
		return $this->belongsTo(VentaServicio::class, 'IdVentaServicio');
	}

	public function actividadesmantenimiento()
	{
		return $this->belongsTo(ActividadMantenimiento::class, 'IdActividad');
	}
}
