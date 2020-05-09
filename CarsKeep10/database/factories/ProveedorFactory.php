<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Proveedor;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(\App\Models\Proveedor::class, function (Faker $faker) {
    return [
        'NombreRazonSocial'=> $faker->firstNameMale,
        'NombreRepresentante'=> $faker->lastName,
        'NroCelular'=> intval($faker->numerify('[76]#######')),
        'Direccion'=> $faker->address,

    ];
});
