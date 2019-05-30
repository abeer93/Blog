<?php

use App\Models\Category;
use App\Models\User;
use Faker\Generator;

$factory->define(Category::class, function (Generator $faker) {
    return [
        'name'      => $faker->name,
        'description' => $faker->paragraph,
        'admin_id' => function () {
            return User::first()->id;
        }
    ];
});
