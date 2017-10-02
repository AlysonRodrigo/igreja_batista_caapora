<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(Cookiesoft\Models\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'sexo' => 'Masculino',
        'password' => $password ?: $password = bcrypt('secret'),
        'data_nascimento' => $faker->date(),
        'remember_token' => str_random(10),
    ];
});


$factory->state(\Cookiesoft\Models\User::class, 'admin', function (Faker\Generator $faker) {

    return [
        'role' => \Cookiesoft\Models\User::ROLE_ADMIN,
    ];
});

$factory->state(\Cookiesoft\Models\User::class, 'client', function (Faker\Generator $faker) {

    return [
        'role' => \Cookiesoft\Models\User::ROLE_CLIENT,
    ];
});