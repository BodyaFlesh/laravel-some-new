<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Company;
use App\Model;
use Faker\Generator as Faker;

$factory->define(Model::class, function (Faker $faker) {
    return [
        'company_id'    => Factory(Company::class)->create(),
        'name'          => $faker->name,
        'email'         => $faker->unique()->safeEmail,
        'active'        => 1
    ];
});
