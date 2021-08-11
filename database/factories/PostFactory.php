<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Category;
use App\User;
use Illuminate;
use Faker\Generator as Faker;

$factory->define(Model::class, function (Faker $faker) {
    return [
        //
        'title' => $this->faker->sentence,
        'excerpt' => $this->faker->sentence,
        'body' => $this->faker->paragraph,
        'user_id' => User::factory(),
        'category_id' => Category::factory(),
        'slug' => $this->faker->slug

        ];
});
