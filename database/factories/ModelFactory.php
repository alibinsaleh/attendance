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

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Student::class, function (Faker\Generator $faker) {
    return [
    	'academic_num' => $faker->numberBetween(32000, 36999),
        'name' => $faker->name,
        'slug' => $faker->slug,
        'registared_at' => $faker->date('Y-m-d'),
        'email' => $faker->email,
        'nationality' => $faker->country,
    ];
});

$factory->define(App\Classroom::class, function (Faker\Generator $faker) {
    return [
    	'classroom_num' => $faker->numberBetween(100, 109),
        'classroom_course' => $faker->word,
        'slug' => $faker->slug,
        'max_size' => $faker->numberBetween(20, 25),
    ];
});