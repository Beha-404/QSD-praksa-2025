<?php

namespace Database\Seeders;

use App\Models\Brands;
use App\Models\Categories;
use App\Models\Colors;
use App\Models\Discounts;
use App\Models\Product;
use App\Models\Size;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
         User::factory(10)->create();
         Size::factory(10)->create();
         Product::factory(10)->create();
         Discounts::factory(10)->create();
         Colors::factory(10)->create();
         Categories::factory(10)->create();
         Brands::factory(10)->create();
    }
}
