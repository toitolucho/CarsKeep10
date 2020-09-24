<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
/**
 * Class Vehiculo
 *
 * @property int $NroPlaca
 * @property int $km
 * @property string $Marca
 * @property string $Modelo
 * @property string $Color
 * @property int $IdCliente
 *
 * @property Cliente $cliente
 * @property Collection|VentaServicio[] $ventasservicios
 *
 * @package App\Models
 */
class Vehiculo extends Model
{
    protected $primaryKey = 'NroPlaca';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;

    protected $casts = [
		'km' => 'int',
	];

	protected $fillable = [
		'NroPlaca',
		'km',
		'Marca',
		'Modelo',
		'Color',
		'IdCliente'
	];
    public function cliente()
	{
		return $this->belongsTo(Cliente::class, 'IdCliente');
    }
    public function ventasservicios()
	{
		return $this->hasMany(VentaServicio::class, 'NroPlaca');
	}

}
