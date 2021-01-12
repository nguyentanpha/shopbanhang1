<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Admin;
use App\Roles;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

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

$factory->define(Admin::class, function (Faker $faker) {
    return [
        'admin_name' => $faker->name,
        'admin_email' => $faker->unique()->safeEmail,
        'admin_phone' => '0906222453',
        'admin_password' => '123123', // password  
    ];
});
$factory->afterCreating(Admin::class,function($admin,$faker){
    $roles = Roles::where('name','user')->get();
    $admin->roles()->sync($roles->pluck('id_roles')->toArray());
});
