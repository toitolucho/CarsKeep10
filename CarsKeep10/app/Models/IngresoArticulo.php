<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class IngresoArticulo
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
class IngresoArticulo extends Model
{
	protected $table = 'ingresosarticulos';
	protected $primaryKey = 'IdIngresoArticulo';
	public $timestamps = false;

	protected $casts = [
		'IdUsuario' => 'int',
        'IdProveedor' => 'int'
	];

	protected $dates = [
		'FechaHoraRegistro'
	];

	protected $fillable = [
		'IdUsuario',
        'IdProveedor',
		'FechaHoraRegistro',
		'CodigoEstadoIngreso',
		'Observaciones'
	];

	public function usuario()
	{
		return $this->belongsTo(Usuario::class, 'IdUsuario');
	}

    public function proveedor()
    {
        return $this->belongsTo(Proveedor::class, 'IdProveedor');
    }

	public function ingresosarticulosdetalles()
	{
		return $this->hasMany(Ingresosarticulosdetalle::class, 'IdIngresoArticulo');
	}

	public function articulos()
    {
        return $this->belongsToMany(Articulo::class, 'IngresosArticulosDetalle', 'IdIngresoArticulo', 'IdArticulo')->withPivot('Cantidad','Precio');
    }

    public function getEstadoAttribute()
    {
        $estado = "HOla";
        switch ($this->CodigoEstadoIngreso)
        {
            case "I":
                $estado = "INICIADO";
                break;
            case "A":
                $estado = "ANULADO";
                break;
            case "F":
                $estado = "FINALIZADO";
                break;
        }

        //return "{$this->Nombres} {$this->Apellidos}";
        return "{$estado}";
    }
}
