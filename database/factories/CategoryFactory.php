<?php
// database/factories/CategoryFactory.php

use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;

class CategoryFactory extends Factory
{
    protected $model = Category::class;

    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'parent_id' => null, // Modify as needed for hierarchical categories
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
