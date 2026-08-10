<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\RecipeCategoryController;
use App\Http\Controllers\Admin\RecipeController;
use App\Http\Controllers\Admin\TipsArticleCategoryController;
use App\Http\Controllers\Admin\TipsArticleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Home\PageController;
use App\Http\Controllers\MealDB\RecipeController as MealDBRecipeController;
use App\Http\Controllers\User\DashboardController as UserDashboardController;
use App\Http\Controllers\User\RecipeController as UserRecipeController;
use App\Http\Controllers\User\TipsArticleController as UserTipsArticleController;
use Illuminate\Support\Facades\Route;

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate'])->name('login.process');
Route::get('/registrasi', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'store'])->name('register.process');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth', 'role:admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::resource('users', UserController::class);
        Route::resource('recipe-categories', RecipeCategoryController::class);
        Route::resource('tips-articles-categories', TipsArticleCategoryController::class)
            ->parameters(['tips-articles-categories' => 'tipsArticleCategory']);
        Route::resource('recipes', RecipeController::class);
        Route::get('recipes/mealdb/{meal}/import', [RecipeController::class, 'import'])
            ->name('recipes.import');
        Route::patch('recipes/{recipe}/status', [RecipeController::class, 'toggleStatus'])
            ->name('recipes.status');

        Route::resource('tips-articles', TipsArticleController::class)
            ->parameters(['tips-articles' => 'tipsArticle']);
        Route::patch('tips-articles/{tipsArticle}/status', [TipsArticleController::class, 'toggleStatus'])
            ->name('tips-articles.status');
    });

Route::middleware(['auth', 'role:user'])
    ->prefix('user')
    ->name('user.')
    ->group(function () {
        Route::get('/dashboard', [UserDashboardController::class, 'index'])->name('dashboard');
        Route::resource('recipes', UserRecipeController::class);
        Route::resource('tips-articles', UserTipsArticleController::class)
            ->parameters(['tips-articles' => 'tipsArticle']);
    });


Route::get('/', [PageController::class, 'index'])->name('home');
Route::get('/resep', [PageController::class, 'recipes'])->name('home.recipes');
Route::get('/resep/mealdb/{meal}', [MealDBRecipeController::class, 'show'])->name('home.recipe-mealdb');
Route::get('tips-artikel', [PageController::class, 'articles'])->name('home.articles');
Route::get('/resep/{recipe}', [PageController::class, 'recipeDetail'])->name('home.recipe-detail');
Route::get('/tips-artikel/{tipsArticle:slug}', [PageController::class, 'articleDetail'])->name('home.article-detail');
Route::redirect('/user', '/user/dashboard');
