<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Recipe;
use App\Models\TipsArticle;

class DashboardController extends Controller
{
    public function index()
    {
        $totalRecipes = Recipe::where('user_id', auth()->id())->count();
        $totalArticles = TipsArticle::where('user_id', auth()->id())->count();

        $latestRecipes = Recipe::with('category')
            ->where('user_id', auth()->id())
            ->latest()
            ->limit(5)
            ->get();

        $latestArticles = TipsArticle::with('category')
            ->where('user_id', auth()->id())
            ->latest()
            ->limit(5)
            ->get();

        return view('pages.user.dashboard', compact(
            'totalRecipes',
            'totalArticles',
            'latestRecipes',
            'latestArticles',
        ));
    }
}
