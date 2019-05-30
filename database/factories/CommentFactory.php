<?php

use App\Models\Comment;
use App\Models\Article;
use App\Models\User;
use Faker\Generator;

$factory->define(Comment::class, function (Generator $faker) {
    return [
        'content' => $faker->sentence,
        'user_id' => function () {
            return factory(User::class)->create()->id;
        },
        'article_id' => function () {
            return factory(Article::class)->create()->id;
        }
    ];
});
