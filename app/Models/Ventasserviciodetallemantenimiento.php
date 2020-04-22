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
 * @property Ventasservicio $ventasservicio
 * @property Actividadesmantenimiento $actividadesmantenimiento
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
		return $this->belongsTo(Ventasservicio::class, 'IdVentaServicio');
	}

	public function actividadesmantenimiento()
	{
		return $this->belongsTo(Actividadesmantenimiento::class, 'IdActividad');
	}
}
