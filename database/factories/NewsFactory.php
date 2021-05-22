<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\News;
use Faker\Generator as Faker;

$factory->define(News::class, function (Faker $faker) {
    return [
        'news_title'    => $faker->realText(30),
        'content'       => $faker->realText(100),
        'news_status'   => rand(0,1)
    ];
});
