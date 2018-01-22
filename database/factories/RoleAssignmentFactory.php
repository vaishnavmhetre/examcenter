<?php

use Faker\Generator as Faker;

$factory->define(\App\RoleAssignment::class, function (Faker $faker) {
    return [
        'user_id' => \App\User::first()->id
    ];
});
