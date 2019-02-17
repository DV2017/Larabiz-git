<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
 */

$factory->define(App\User::class, function (Faker $faker) {
  return [
    'name' => 'User',
    'email' => 'userTesting@mail.com',
    'email_verified_at' => now(),
    'password' => '$2y$10$mq1bBWZ4wiV.kfYbAW3O0.0Un6.5cf09m1DIxO.TPEYG/2baX82Ca', // password
    'remember_token' => str_random(10),
  ];
});
