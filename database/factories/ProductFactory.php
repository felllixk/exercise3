<?php

namespace Database\Factories;

use App\Models\Catalog;
use App\Models\Category;
use App\Models\Subcatalog;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
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
        $subcatalog = Subcatalog::inRandomOrder()->first();
        $catalog = $subcatalog->catalog;
        $category = Category::inRandomOrder()->whereSubcatalogId($subcatalog->id)->first();

        return [
            'name'          =>  $name,
            'slug'          =>  $slug,
            'description'   =>  fake()->sentence(3),
            'amount'        =>  fake()->numberBetween(100, 10000),
            'catalog_id'    =>  $catalog->id,
            'subcatalog_id' =>  $subcatalog->id,
            'category_id'   =>  $category ? $category->id : null,
            'user_id'       =>  User::inRandomOrder()->first()->id
        ];
    }
}
