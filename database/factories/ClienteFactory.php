<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Cliente;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Cliente::class, function (Faker $faker) {
    return [
        'ci'=> $faker->randomNumber($nbDigits = 7, $strict = false),
        'Nombres'=> $faker->firstNameMale,
        'Apellidos'=> $faker->lastName,
        'NroCelular'=> intval($faker->numerify('[76]#######')),
        'CorreoElectronico'=> $faker->email,
//        'FechaNacimiento'=> $faker->dateTime($max = '01/01/1980', $timezone = null),
        'FechaRegistro'=> $faker->dateTime($max = 'now', $timezone = null),
//        'NroVisitas'=> $faker->randomDigit,

    ];
});
