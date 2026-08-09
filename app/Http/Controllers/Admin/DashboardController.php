<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Recipe;
use App\Models\TipsArticle;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $totalUsers = User::count();
        $totalRecipes = Recipe::count();
        $totalArticles = TipsArticle::count();

        $latestRecipes = Recipe::with(['category', 'user'])
            ->latest()
            ->limit(5)
            ->get();

        $latestArticles = TipsArticle::with(['category', 'user'])
            ->latest()
            ->limit(5)
            ->get();

        return view('pages.admin.dashboard', compact(
            'totalUsers',
            'totalRecipes',
            'totalArticles',
            'latestRecipes',
            'latestArticles',
        ));
    }
}
