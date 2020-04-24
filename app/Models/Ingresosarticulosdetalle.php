<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Ingresosarticulosdetalle
 * 
 * @property int $IdIngresoArticulo
 * @property int $IdArticulo
 * @property int $Cantidad
 * @property float $Precio
 * 
 * @property IngresoArticulo $ingresosarticulo
 * @property Articulo $articulo
 *
 * @package App\Models
 */
class Ingresosarticulosdetalle extends Model
{
	protected $table = 'ingresosarticulosdetalle';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'IdIngresoArticulo' => 'int',
		'IdArticulo' => 'int',
		'Cantidad' => 'int',
		'Precio' => 'float'
	];

	protected $fillable = [
		'Cantidad',
		'Precio'
	];

	public function ingresosarticulo()
	{
		return $this->belongsTo(IngresoArticulo::class, 'IdIngresoArticulo');
	}

	public function articulo()
	{
		return $this->belongsTo(Articulo::class, 'IdArticulo');
	}
}
