<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use App\VariableProduct;
use Faker\Generator as Faker;

$factory->define(VariableProduct::class, function (Faker $faker) {
    $product = Product::inRandomOrder()->first();
    return [
        'product_id' => $product->id, 
        'code'       => $faker->numberBetween(1,10),
        'measure'    => $faker->numberBetween(1,9) . ' mm',
        'packaging'  => 'Carretel de 1000mts'
    ];
});

