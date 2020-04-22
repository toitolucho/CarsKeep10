<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Cliente
 * 
 * @property int $IdCliente
 * @property string $ci
 * @property string $Nombres
 * @property string $Apellidos
 * @property int $NroCelular
 * @property string $CorreoElectronico
 * @property Carbon $FechaRegistro
 * 
 * @property Collection|Ventasservicio[] $ventasservicios
 *
 * @package App\Models
 */
class Cliente extends Model
{
	protected $table = 'clientes';
	protected $primaryKey = 'IdCliente';
	public $timestamps = false;

	protected $casts = [
		'NroCelular' => 'int'
	];

	protected $dates = [
		'FechaRegistro'
	];

	protected $fillable = [
		'ci',
		'Nombres',
		'Apellidos',
		'NroCelular',
		'CorreoElectronico',
		'FechaRegistro'
	];

	public function ventasservicios()
	{
		return $this->hasMany(Ventasservicio::class, 'IdCliente');
	}
}

/*
 * Para generar los 50 valores ejecutar en la cocnsola
 * factory(App\Models\Cliente::class, 50)->create();
 *
 * */
