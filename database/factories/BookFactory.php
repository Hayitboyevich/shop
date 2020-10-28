<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Book;
use Faker\Generator as Faker;

$factory->define(Book::class, function (Faker $faker) {
	$sentence = $faker->sentence(5);
    return [
        'title' => substr($sentence, 0, strlen($sentence) - 1),
		'description' => $faker->text(2000),
    ];
});
