<?php

namespace Database\Factories;

use App\Models\Subcatalog;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $name = fake()->unique()->word();
        $slug = Str::slug($name);

        return [
            'name'  => $name,
            'slug' => $slug,
            'subcatalog_id' => Subcatalog::inRandomOrder()->first()->id,
        ];
    }
}
