<?php

use Faker\Generator as Faker;
use Carbon\Carbon;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'birth_date' => $faker->date($format = 'Y-m-d', Carbon::now()->addYears(18)),
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
        'type' => 1,
        'cpf' => $faker->numerify("###.###.###-##"),

    ];
});

$factory->define(App\Category::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'description' => $faker->text(250)
    ];
});

$factory->define(App\Product::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'price' => rand(100.00,350.00),
        'description' => $faker->text(250),
        'qtd' => rand(10,300),
        'image' => rand(1,5) . ".jpg",
    ];
});

$factory->define(App\Address::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'street' => $faker->streetName,
        'number' => rand(1,3000),
        'complement' => array_rand(array("Casa","360 A","125 B","450 E"," Fundos","Loja")),
        'neighborhood' => $faker->city,
        'city' => $faker->city,
        'state' => $faker->name,
        'country' => $faker->country,
        'cep' => "02830-255",
        'reference_point' => $faker->text(60),
    ];
});

$factory->define(App\Card::class, function (Faker $faker) {
    return [
    ];
});

$factory->define(App\Shopping::class, function (Faker $faker) {
    return [
    ];
});
