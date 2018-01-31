<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(QUIZ\Models\OptionSet::class, function (Faker\Generator $faker) {

    return [
        'question_id' => $faker->randomDigit,
        'option_1' => $faker->realText(),
        'option_2' => $faker->realText(),
        'option_3' => $faker->realText(),
        'option_4' => $faker->realText(),
        'answer' => $faker->randomNumber(1)
    ];
});
