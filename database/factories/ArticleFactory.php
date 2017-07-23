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

use Carbon\Carbon;

$factory->define(App\Models\Article::class, function (Faker\Generator $faker) {

    return [
        'title'         => $faker->sentence,
        'content'       => $faker->text,
        'url'           => '',
        'uuid'          => $faker->uuid,
        'user_id'       => 1,
        'category_id'   => $faker->numberBetween(1, 12),
        'published_at'  => Carbon::now(),
        'banner_url'    => '',
        'is_draft'      => $faker->boolean($chanceOfGettingTrue = 20),
    ];
});
