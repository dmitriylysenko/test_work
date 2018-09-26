<?php
/**
 * Created by PhpStorm.
 * User: Dmitriy
 * Date: 26.09.2018
 * Time: 22:44
 */

use Faker\Generator as Faker;

$factory->define(App\Project::class, function (Faker $faker) {
    return [
        'name'        => $faker->company,
        'description' => $faker->text,
        'statuses'    => $faker->randomElement(['planned', 'running', 'on_hold', 'finished', 'cancel'])
    ];
});
