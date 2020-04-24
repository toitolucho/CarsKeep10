<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Usuario
 * 
 * @property int $IdUsuario
 * @property string $NombreCompleto
 * @property string $NombreUsuario
 * @property string $Contrasenia
 * @property Carbon $FechaRegistro
 * @property string $TipoUsuario
 * @property string $CodigoEstadoDisposicion
 * @property string $CodigoEstado
 * 
 * @property Collection|IngresoArticulo[] $ingresosarticulos
 * @property Collection|VentaServicio[] $ventasservicios
 *
 * @package App\Models
 */
class Usuario extends Model
{
	protected $table = 'usuarios';
	protected $primaryKey = 'IdUsuario';
	public $timestamps = false;

	protected $dates = [
		'FechaRegistro'
	];

	protected $fillable = [
		'NombreCompleto',
		'NombreUsuario',
		'Contrasenia',
		'FechaRegistro',
		'TipoUsuario',
		'CodigoEstadoDisposicion',
		'CodigoEstado'
	];

	public function ingresosarticulos()
	{
		return $this->hasMany(IngresoArticulo::class, 'IdUsuario');
	}

	public function ventasservicios()
	{
		return $this->hasMany(VentaServicio::class, 'IdUsuarioSecretaria');
	}
}
