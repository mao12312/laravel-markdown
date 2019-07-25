<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Post;
use Faker\Generator as Faker;

$factory->define(App\Post::class, function (Faker $faker) {
    return [
        'title' => 'タイトル',
        'text' => '投稿テスト投稿テスト投稿テスト投稿テスト投稿テスト投稿テスト投稿テスト投稿テスト'
    ];
});
