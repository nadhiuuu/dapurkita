<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Recipe;
use App\Models\TipsArticle;
use App\Services\MealDBService;
use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Landing page.
     */
    public function index()
    {
        $latestRecipes = Recipe::with(['category', 'user'])
            ->where('status', 'publish')
            ->latest()
            ->limit(6)
            ->get();

        $latestArticles = TipsArticle::with(['category', 'user'])
            ->where('status', 'publish')
            ->latest()
            ->limit(6)
            ->get();

        $recipeCount = Recipe::where('status', 'publish')->count();
        $articleCount = TipsArticle::where('status', 'publish')->count();
        $userCount = \App\Models\User::count();

        return view('pages.home.landing', compact(
            'latestRecipes',
            'latestArticles',
            'recipeCount',
            'articleCount',
            'userCount',
        ));
    }

    /**
     * Recipe listing page.
     *
     * Pencarian bersifat hybrid: hasil dari database DapurKita
     * dipadukan dengan referensi dari TheMealDB di halaman yang sama.
     */
    public function recipes(Request $request, MealDBService $mealdb)
    {
        $search = trim((string) $request->query('search', ''));

        $recipes = Recipe::with(['category', 'user'])
            ->where('status', 'publish')
            ->when($search !== '', fn ($query) => $query->where('title', 'like', '%'.$search.'%'))
            ->latest()
            ->paginate(12)
            ->withQueryString();

        $mealDbRecipes = [];
        $mealDbError = null;

        if ($search !== '') {
            $result = $mealdb->search($search);

            $mealDbRecipes = $result['recipes'];
            $mealDbError = $result['error'];
        }

        return view('pages.home.pages.recipes', compact(
            'recipes',
            'mealDbRecipes',
            'mealDbError',
            'search',
        ));
    }

    /**
     * Tips & article listing page.
     */
    public function articles()
    {
        $tipsArticles = TipsArticle::with(['category', 'user'])
            ->where('status', 'publish')
            ->latest()
            ->paginate(12)
            ->withQueryString();

        return view('pages.home.pages.tips-articles', compact('tipsArticles'));
    }

    /**
     * Recipe detail page.
     */
    public function recipeDetail(Recipe $recipe)
    {
        abort_unless($recipe->status === 'publish', 404);

        $recipe->load(['category', 'user']);

        return view('pages.home.pages.recipe-detail', compact('recipe'));
    }

    /**
     * Tips & article detail page.
     */
    public function articleDetail(TipsArticle $tipsArticle)
    {
        abort_unless($tipsArticle->status === 'publish', 404);

        $tipsArticle->load(['category', 'user']);

        return view('pages.home.pages.article-detail', compact('tipsArticle'));
    }
}
