<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Store;
use Faker\Generator as Faker;

$factory->define(Store::class, function (Faker $faker) {
    return [
        'name' => $faker->name('male'),
        'address' => $faker->address,
        'phone' => $faker->phoneNumber,
        'logo_url' => $faker->imageUrl()
    ];
});
