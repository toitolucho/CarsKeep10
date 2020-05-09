<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Articulo
 * 
 * @property int $IdArticulo
 * @property string $NombreArticulo
 * @property int $IdCategoria
 * @property int $CantidadExistencia
 * @property float $PrecioVigente
 * @property string $TipoInventario
 * @property string $Descripcion
 * 
 * @property Categoria $categoria
 * @property Collection|Ingresosarticulosdetalle[] $ingresosarticulosdetalles
 * @property Collection|TipoMantenimientoDetalle[] $tiposmantenimientosdetalles
 * @property Collection|VentaServicio[] $ventasservicios
 *
 * @package App\Models
 */
class Articulo extends Model
{
	protected $table = 'articulos';
	protected $primaryKey = 'IdArticulo';
	public $timestamps = false;

	protected $casts = [
		'IdCategoria' => 'int',
		'CantidadExistencia' => 'int',
		'PrecioVigente' => 'float'
	];

	protected $fillable = [
		'NombreArticulo',
		'IdCategoria',
		'CantidadExistencia',
		'PrecioVigente',
		'TipoInventario',
		'Descripcion'
	];

	public function categoria()
	{
		return $this->belongsTo(Categoria::class, 'IdCategoria');
	}

	public function ingresosarticulosdetalles()
	{
		return $this->hasMany(Ingresosarticulosdetalle::class, 'IdArticulo');
	}

	public function tiposmantenimientosdetalles()
	{
		return $this->belongsToMany(TipoMantenimientoDetalle::class, 'tiposmantenimientosdetallearticulos', 'IdArticulo', 'IdTipoMantenimiento')
					->withPivot('IdActividad');
	}

	public function ventasservicios()
	{
		return $this->belongsToMany(VentaServicio::class, 'ventasserviciodetallearticulos', 'IdArticulo', 'IdVentaServicio')
					->withPivot('Cantidad', 'Costo');
	}
}
