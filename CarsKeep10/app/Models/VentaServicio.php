<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use App\Models\Articulo;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt;
use App\Models\ActividadMantenimiento;


/**
 * Class VentaServicio
 * 
 * @property int $IdVentaServicio
 * @property int $IdUsuarioSecretaria
 * @property int $IdUsuarioTecnico
 * @property int $IdCliente
 * @property Carbon $FechaHoraVenta
 * @property string $CodigoEstadoVenta
 * @property float $Kilometraje
 * @property string $MarcaMovilidad
 * @property string $Observaciones
 * 
 * @property Usuario $usuario
 * @property Cliente $cliente
 * @property Collection|Articulo[] $articulos
 * @property Collection|ActividadMantenimiento[] $actividadesMantenimiento
 * @property Collection|Ventasserviciodetallemantenimiento[] $ventasserviciodetallemantenimientos
 *
 * @package App\Models
 */
class VentaServicio extends Model
{
	protected $table = 'ventasservicio';
	protected $primaryKey = 'IdVentaServicio';
	public $timestamps = false;

	protected $casts = [
		'IdUsuarioSecretaria' => 'int',
		'IdUsuarioTecnico' => 'int',
		'IdCliente' => 'int',
        'IdTipoMantenimiento' => 'int',
		'Kilometraje' => 'float'
	];

	protected $dates = [
		'FechaHoraVenta'
	];

	protected $fillable = [
		'IdUsuarioSecretaria',
		'IdUsuarioTecnico',
		'IdCliente',
        'NroPlaca',
		'FechaHoraVenta',
		'CodigoEstadoVenta',
		'Kilometraje',
		'MarcaMovilidad',
		'Observaciones',
        'IdTipoMantenimiento'
	];

	public function usuario()
	{
		return $this->belongsTo(Usuario::class, 'IdUsuarioSecretaria');
	}

	public function cliente()
	{
		return $this->belongsTo(Cliente::class, 'IdCliente');
	}

	public function articulos()
	{
		return $this->belongsToMany(Articulo::class, 'ventasserviciodetallearticulos', 'IdVentaServicio', 'IdArticulo')
					->withPivot('Cantidad', 'Costo');
	}

	public function ventasserviciodetallemantenimientos()
	{
		return $this->hasMany(Ventasserviciodetallemantenimiento::class, 'IdVentaServicio');
	}

    public function actividadesMantenimiento()
    {
        return $this->belongsToMany(ActividadMantenimiento::class, 'VentasServicioDetalleMantenimiento', 'IdVentaServicio', 'IdActividad')
            ->withPivot('Costo', 'CodigoEstadoEjecucion', 'Observacion' );
    }


    public function getEstadoAttribute()
    {
        $estado = "HOla";
        switch ($this->CodigoEstadoVenta)
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
        return "{$estado}";
    }
    public function getIdVentaServicioEncriptadoAttribute()
    {
        $estado = Crypt::encrypt($this->IdVentaServicio);

        return "{$estado}";
    }

}
