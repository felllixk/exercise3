<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory(1)->create();
        \App\Models\Catalog::factory(10)->create();
        \App\Models\Subcatalog::factory(25)->create();
        \App\Models\Category::factory(40)->create();
        \App\Models\Product::factory(50)->create();
        \App\Models\Characteristic::factory(70)->create();
    }
}
