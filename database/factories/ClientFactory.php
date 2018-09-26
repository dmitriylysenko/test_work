<?php
/**
 * Created by PhpStorm.
 * User: Dmitriy
 * Date: 26.09.2018
 * Time: 22:44
 */

use Faker\Generator as Faker;

$factory->define(App\Client::class, function (Faker $faker) {
    return [
        'first_name' => $faker->name,
        'last_name'  => $faker->lastName,
        'email'      => $faker->unique()->safeEmail,
        'password'   => $faker->password(6)
    ];
});
