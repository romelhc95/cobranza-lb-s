<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

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

$factory->define(User::class, function (Faker $faker) {
    return [
        'document' => 'DNI',
        'document_number' => $faker->numberBetween($min = 42000000, $max = 79999999),
        //'first_name' => $faker->firstName($gender = null|'male'|'female'),
        'first_name' => $faker->firstName,
        'second_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'second_last_name' => $faker->lastName,
        'phone' => $faker->numberBetween($min = 910000009, $max = 989999999),
        'password' => Hash::make('12345678'), // password
        'remember_token' => Str::random(10),
        'address' => $faker->address,
        'sector_id' => $faker->numberBetween($min = 1, $max = 7),
    ];
});
