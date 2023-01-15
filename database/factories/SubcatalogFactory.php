<?php

namespace Database\Factories;

use App\Models\Catalog;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\subcatalog>
 */
class SubcatalogFactory extends Factory
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
            'catalog_id' => Catalog::inRandomOrder()->first()->id,
        ];
    }
}
