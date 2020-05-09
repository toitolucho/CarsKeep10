<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Proveedor
 * 
 * @property int $IdProveedor
 * @property string $NombreCompleto
 * @property string $NombreProveedor
 * @property string $Contrasenia
 * @property Carbon $FechaRegistro
 * @property string $TipoProveedor
 * @property string $CodigoEstadoDisposicion
 * @property string $CodigoEstado
 * 
 * @property Collection|IngresoArticulo[] $ingresosarticulos
 * @property Collection|VentaServicio[] $ventasservicios
 *
 * @package App\Models
 */
class Proveedor extends Model
{
	protected $table = 'proveedores';
	protected $primaryKey = 'IdProveedor';


    public $timestamps = false;

    protected $fillable = [
		'NombreRazonSocial',
		'NombreRepresentante',
		'Direccion',
		'NroCelular'
	];

	public function ingresosarticulos()
	{
		return $this->hasMany(IngresoArticulo::class, 'IdProveedor');
	}

}
