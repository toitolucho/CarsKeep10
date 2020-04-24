<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Ventasserviciodetallearticulo
 * 
 * @property int $IdVentaServicio
 * @property int $IdArticulo
 * @property int $Cantidad
 * @property float $Costo
 * 
 * @property VentaServicio $ventasservicio
 * @property Articulo $articulo
 *
 * @package App\Models
 */
class Ventasserviciodetallearticulo extends Model
{
	protected $table = 'ventasserviciodetallearticulos';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'IdVentaServicio' => 'int',
		'IdArticulo' => 'int',
		'Cantidad' => 'int',
		'Costo' => 'float'
	];

	protected $fillable = [
		'Cantidad',
		'Costo'
	];

	public function ventasservicio()
	{
		return $this->belongsTo(VentaServicio::class, 'IdVentaServicio');
	}

	public function articulo()
	{
		return $this->belongsTo(Articulo::class, 'IdArticulo');
	}
}
