<?php

/*
|-------------------------------------------------------------------
| Model Factories
|-------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories
| give you a convenient way to create models for testing and seeding
| your database. Just tell the factory how a default model should
| look.
*/

$factory->define(App\Models\Role::class, function (Faker\Generator $faker) {
    return [
        'name'     => $faker->title,
    ];
});

$factory->define(App\Models\Team::class, function (Faker\Generator $faker) {
    return [
        'title'     => $faker->title,
    ];
});

$factory->define(App\Models\User::class, function (Faker\Generator $faker) {
    return [
        'name'     => $faker->name,
        'email'    => $faker->unique()->email,
        'password' =>  bcrypt('12345'),
        'role_id' => 1,
    ];
});


$factory->define(App\Models\UserTeam::class, function (Faker\Generator $faker) {
    return [
        'user_id'     => 1,
        'team_id'     => 1,
        'owner'     => $faker->boolean,
    ];
});