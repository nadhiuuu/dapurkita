<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\RecipeCategory;
use Illuminate\Support\Str;

class RecipeCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Makanan Utama',
            'Minuman',
            'Dessert',
            'Snack',
            'Kue',
        ];

        foreach ($categories as $category) {
            RecipeCategory::create([
                'name' => $category,
                'slug' => Str::slug($category),
            ]);
        }
    }
}
