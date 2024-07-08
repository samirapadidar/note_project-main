<?php

use Faker\Generator as Faker;
use App\Models\Note;

$factory->define(Note::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(4),
        'category_id' => function () {
            return factory(App\Models\Category::class)->create()->id;
        },
        'content' => $faker->paragraphs(3, true),
        'created_at' => now(),
        'updated_at' => now(),
    ];
});
