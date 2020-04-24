<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\News;
use Faker\Generator as Faker;

    $factory->define(News::class, function (Faker $faker) {
        //$faker = Faker\Factory::create('ru_RU');
        return [
            'title' => $faker->realText(rand(20, 30)),
            'text' => $faker->realText(rand(120, 200)),
            'isPrivate' => (bool)rand(0, 1),
            'category_id' => rand(1, 10)

        ];
    });

