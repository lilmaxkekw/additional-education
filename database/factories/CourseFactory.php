<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Course;
use Faker\Generator as Faker;

$factory->define(Course::class, function (Faker $faker) {
    return [
        'name_of_course' => $faker->realText(30),
        'description_of_course'=> $faker->realText(),
        'number_of_course' => $faker->numberBetween(10),
        'image_of_course' => $faker->imageUrl()
    ];
});
