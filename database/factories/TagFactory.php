<?php

namespace Database\Factories;

use App\Models\Tag;
use Illuminate\Database\Eloquent\Factories\Factory;

class TagFactory extends Factory
{
    /**
     * Define which model should factory get linked to
     * @var string
     */
    protected $model = Tag::class;

    /**
     * Define the model's default state.
     * @return array|mixed[]
     * @throws \Exception
     */
    public function definition(): array
    {
        return [
            'name'=>$this->faker->text,
            'created_at'=>now(),
            'updated_at'=>now()
        ];
    }
}
