<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use App\User;
use App\Category;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    $title = $faker->sentence;

    return [
        'title' => $title,
        'body' => $faker->paragraph(20),
        'user_id' => 1,
        'slug' => Str::slug($title),
        'image' => null,
        'published' => true,
        'category_id' => create(Category::class)->id,
        'user_id' => auth()->id() ?? create(User::class)->id,
    ];
});
