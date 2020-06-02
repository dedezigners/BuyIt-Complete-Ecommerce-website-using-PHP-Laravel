<?php

use Illuminate\Support\Str;
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
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => Str::random(10),
    ];
});


$factory->define(App\Category::class, function (Faker $faker) {
    $name = trim($faker->unique()->sentence(1), '.');
    $slug = generateSlug($name);
    
    return [
        'name' => $name,
        'slug' => $slug
    ];
});


$factory->define(App\Product::class, function (Faker $faker) {
    $name = trim($faker->unique()->sentence(2), '.');
    $slug = generateSlug($name);
    $image = 'assets/uploads/products/' . rand(1, 8) . '.jpg';
    
    return [
        'category_id' => rand(1, 20),
        'name' => $name,
        'slug' => $slug,
        'image' => $image,
        'price' => $faker->numberBetween(100, 500),
        'description' => $faker->paragraph(4),
    ];
});


function generateSlug($string)
{
    $string = preg_replace('~[^\pL\d]+~u', '-', $string);
    $string = iconv('utf-8', 'us-ascii//TRANSLIT', $string);
    $string = preg_replace('~[^-\w]+~', '', $string);
    $string = trim($string, '-');
    $string = preg_replace('~-+~', '-', $string);
    $string = strtolower($string);
    
    return !empty($string) ? $string : false;
}