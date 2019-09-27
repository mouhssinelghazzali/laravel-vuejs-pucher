<?php

use Faker\Generator as Faker;

$factory->define(App\Model\CategoryQuestion::class, function (Faker $faker) {
    return [
        'question_id' => function(){

            return \App\Model\Question::all()->random();
        },
        'category_id' => function(){

            return \App\Model\Category::all()->random();
        }
    ];
});
