<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Ingresosarticulo
 * 
 * @property int $IdIngresoArticulo
 * @property int $IdUsuario
 * @property Carbon $FechaHoraRegistro
 * @property string $CodigoEstadoIngreso
 * @property string $Observaciones
 * 
 * @property Usuario $usuario
 * @property Collection|Ingresosarticulosdetalle[] $ingresosarticulosdetalles
 *
 * @package App\Models
 */
class Ingresosarticulo extends Model
{
	protected $table = 'ingresosarticulos';
	protected $primaryKey = 'IdIngresoArticulo';
	public $timestamps = false;

	protected $casts = [
		'IdUsuario' => 'int'
	];

	protected $dates = [
		'FechaHoraRegistro'
	];

	protected $fillable = [
		'IdUsuario',
		'FechaHoraRegistro',
		'CodigoEstadoIngreso',
		'Observaciones'
	];

	public function usuario()
	{
		return $this->belongsTo(Usuario::class, 'IdUsuario');
	}

	public function ingresosarticulosdetalles()
	{
		return $this->hasMany(Ingresosarticulosdetalle::class, 'IdIngresoArticulo');
	}
}
