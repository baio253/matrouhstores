<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'store_id' => factory(\App\Store::class),
        'name' => $faker->company,
        'price' => $faker->numberBetween(349,350),
        'description' => $faker->sentence,
        'photo_url' => $faker->imageUrl()
    ];
});
