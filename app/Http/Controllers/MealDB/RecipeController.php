<?php

namespace App\Http\Controllers\MealDB;

use App\Http\Controllers\Controller;
use App\Services\MealDBService;

class RecipeController extends Controller
{
    public function __construct(
        private readonly MealDBService $mealdb,
    ) {
    }

    /**
     * Menampilkan detail resep dari TheMealDB.
     *
     * Data hanya ditampilkan dan tidak disimpan ke database.
     */
    public function show(string $mealId)
    {
        $result = $this->mealdb->lookup($mealId);

        if ($result['error'] !== null) {
            return view('pages.home.pages.recipe-mealdb', [
                'recipe' => null,
                'message' => $result['error'],
                'isError' => true,
            ]);
        }

        if ($result['recipe'] === null) {
            return view('pages.home.pages.recipe-mealdb', [
                'recipe' => null,
                'message' => 'Resep referensi tidak ditemukan di TheMealDB.',
                'isError' => false,
            ]);
        }

        return view('pages.home.pages.recipe-mealdb', [
            'recipe' => $result['recipe'],
            'message' => null,
            'isError' => false,
        ]);
    }
}
