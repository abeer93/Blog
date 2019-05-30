<?php

use App\Models\Article;
use App\Models\User;
use Faker\Generator;
use App\Models\Category;

$factory->define(Article::class, function (Generator $faker) {
    return [
        'title'       => $faker->sentence,
        'content'     => $faker->paragraph,
        'image'       => "pexels-photo-302549.jpeg",
        'category_id' => function () {
            return factory(Category::class)->create()->id;
        },
        'admin_id' => function () {
            return factory(User::class)->create()->id;
        }
    ];
});
