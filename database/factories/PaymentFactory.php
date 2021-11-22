<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Payment;
use Faker\Generator as Faker;

$factory->define(Payment::class, function (Faker $faker) {
    return [
        'payment' => 300,
        'new_payment' => 3000,
        'loan_status' => 'Pendiente',
        'payment_status' => 'Pendiente',
        'loan_id' => $faker->numberBetween($min = 1, $max = 150),
        'user_id' => $faker->numberBetween($min = 1, $max = 100)
    ];
});
