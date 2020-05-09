<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\IngresoArticulo;

use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(IngresoArticulo::class, function (Faker $faker) {

    $users = App\Models\Usuario::pluck('IdUsuario')->toArray();
    $proveedores = App\Models\Proveedor::pluck('IdProveedor')->toArray();
    return [
        //
        'IdUsuario'=>$faker->randomElement($users),
        'IdProveedor'=>$faker->randomElement($proveedores),
        'FechaHoraRegistro'=>$faker->dateTime($max = 'now', $timezone = null),
        'CodigoEstadoIngreso'=>$faker->randomElement($array = array ('I','A','F')),
        'Observaciones'=>$faker->sentence($nbWords = 20, $variableNbWords = true),
    ];
});
