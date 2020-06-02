<?php

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\User::create([
            'name' => 'Atif Ibrahim',
            'email' => 'info@dede.com',
            'password' => bcrypt('password'),
            'remember_token' => Str::random(10),
        ]);

        factory(\App\Category::class, 20)->create();
        factory(\App\Product::class, 60)->create();
    }
}
