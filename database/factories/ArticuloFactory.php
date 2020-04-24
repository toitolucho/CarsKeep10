<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Articulo;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Articulo::class, function (Faker $faker) {
    $categorias = App\Models\Categoria::pluck('IdCategoria')->toArray();

    return [
//       'CodigoArticulo'	=> substr($faker->swiftBicNumber,0,9) ,
       'NombreArticulo'		=> $faker->name,
       'IdCategoria'		=> $faker->randomElement($categorias),
       'CantidadExistencia'	=> $faker->randomNumber($nbDigits = 3, $strict = false) ,
       'PrecioVigente'		=> $faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 10000),
       'TotalValorado'		=> $faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 10000),
       'TipoInventario'		=> $faker->randomElement($array = array ('P','O','U')),
       'Descripcion'		=> $faker->sentence($nbWords = 30, $variableNbWords = true),
//       'FechaVencimiento'	=> date($format = 'd-m-Y', $max = 'now'),

    ];
});
