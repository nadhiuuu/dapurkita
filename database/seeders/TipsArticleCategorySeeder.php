<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TipsArticleCategory;
use Illuminate\Support\Str;

class TipsArticleCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Tips Dapur & Hack',
            'Penyimpanan Bahan',
            'Kesehatan & Nutrisi',
            'Peralatan Memasak',
            'Inspirasi & Tren Kuliner',
        ];

        foreach ($categories as $category) {
            TipsArticleCategory::create([
                'name' => $category,
                'slug' => Str::slug($category),
            ]);
        }
    }
}
