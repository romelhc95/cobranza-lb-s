<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Loan;
use Faker\Generator as Faker;

$factory->define(Loan::class, function (Faker $faker) {
    $loan = $faker->numberBetween($min = 1000, $max = 5000);
    $monetary_interest = $faker->numberBetween($min = 5, $max = 30);
    $amount = $loan * ($monetary_interest/100) + $loan;

    return [
        'loan' => $loan,
        'monetary_interest' => $monetary_interest,
        'amount' => $amount,
        'user_id' => $faker->numberBetween($min = 2, $max = 100)
    ];
});
