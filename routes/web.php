<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LandingPageController;
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

Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Users
    Route::get('users', [UserController::class, 'index'])->name('users.index');
    Route::get('users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('users', [UserController::class, 'store'])->name('users.store');
    Route::get('users/{user}', [UserController::class, 'show'])->name('users.show');
    Route::get('users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('users/{user}', [UserController::class, 'update'])->name('users.update');
    Route::delete('users/{user}', [UserController::class, 'destroy'])->name('users.destroy');

    // Recipe categories
    Route::get('recipe-categories', [RecipeCategoryController::class, 'index'])->name('recipe-categories.index');
    Route::get('recipe-categories/create', [RecipeCategoryController::class, 'create'])->name('recipe-categories.create');
    Route::post('recipe-categories', [RecipeCategoryController::class, 'store'])->name('recipe-categories.store');
    Route::get('recipe-categories/{recipeCategory}/edit', [RecipeCategoryController::class, 'edit'])->name('recipe-categories.edit');
    Route::put('recipe-categories/{recipeCategory}', [RecipeCategoryController::class, 'update'])->name('recipe-categories.update');
    Route::delete('recipe-categories/{recipeCategory}', [RecipeCategoryController::class, 'destroy'])->name('recipe-categories.destroy');

    // Tips & article categories
    Route::get('tips-articles-categories', [TipsArticleCategoryController::class, 'index'])->name('tips-articles-categories.index');
    Route::get('tips-articles-categories/create', [TipsArticleCategoryController::class, 'create'])->name('tips-articles-categories.create');
    Route::post('tips-articles-categories', [TipsArticleCategoryController::class, 'store'])->name('tips-articles-categories.store');
    Route::get('tips-articles-categories/{tipsArticleCategory}/edit', [TipsArticleCategoryController::class, 'edit'])->name('tips-articles-categories.edit');
    Route::put('tips-articles-categories/{tipsArticleCategory}', [TipsArticleCategoryController::class, 'update'])->name('tips-articles-categories.update');
    Route::delete('tips-articles-categories/{tipsArticleCategory}', [TipsArticleCategoryController::class, 'destroy'])->name('tips-articles-categories.destroy');

    // Recipes
    Route::get('recipes', [RecipeController::class, 'index'])->name('recipes.index');
    Route::get('recipes/create', [RecipeController::class, 'create'])->name('recipes.create');
    Route::post('recipes', [RecipeController::class, 'store'])->name('recipes.store');
    Route::get('recipes/mealdb/{meal}/import', [RecipeController::class, 'import'])->name('recipes.import');
    Route::get('recipes/{recipe}/edit', [RecipeController::class, 'edit'])->name('recipes.edit');
    Route::patch('recipes/{recipe}/status', [RecipeController::class, 'toggleStatus'])->name('recipes.status');
    Route::put('recipes/{recipe}', [RecipeController::class, 'update'])->name('recipes.update');
    Route::delete('recipes/{recipe}', [RecipeController::class, 'destroy'])->name('recipes.destroy');

    // Tips & articles
    Route::get('tips-articles', [TipsArticleController::class, 'index'])->name('tips-articles.index');
    Route::get('tips-articles/create', [TipsArticleController::class, 'create'])->name('tips-articles.create');
    Route::post('tips-articles', [TipsArticleController::class, 'store'])->name('tips-articles.store');
    Route::get('tips-articles/{tipsArticle}/edit', [TipsArticleController::class, 'edit'])->name('tips-articles.edit');
    Route::patch('tips-articles/{tipsArticle}/status', [TipsArticleController::class, 'toggleStatus'])->name('tips-articles.status');
    Route::put('tips-articles/{tipsArticle}', [TipsArticleController::class, 'update'])->name('tips-articles.update');
    Route::delete('tips-articles/{tipsArticle}', [TipsArticleController::class, 'destroy'])->name('tips-articles.destroy');

    // Landing page
    Route::prefix('landing-page')
        ->name('landing-page.')
        ->group(function () {
            Route::get('/', [LandingPageController::class, 'index'])->name('index');
            Route::get('hero', [LandingPageController::class, 'hero'])->name('hero');
            Route::put('hero', [LandingPageController::class, 'updateHero'])->name('hero.update');
            Route::get('about', [LandingPageController::class, 'about'])->name('about');
            Route::put('about', [LandingPageController::class, 'updateAbout'])->name('about.update');
            Route::post('about/advantages', [LandingPageController::class, 'storeAdvantage'])
                ->name('about.advantages.store');
            Route::put('about/advantages/{aboutAdvantage}', [LandingPageController::class, 'updateAdvantage'])
                ->name('about.advantages.update');
            Route::delete('about/advantages/{aboutAdvantage}', [LandingPageController::class, 'destroyAdvantage'])
                ->name('about.advantages.destroy');
            Route::get('footer', [LandingPageController::class, 'footer'])->name('footer');
            Route::put('footer', [LandingPageController::class, 'updateFooter'])->name('footer.update');
        });
});

Route::middleware(['auth', 'role:user'])
    ->prefix('user')
    ->name('user.')
    ->group(function () {
        Route::get('/dashboard', [UserDashboardController::class, 'index'])->name('dashboard');

        // Recipes
        Route::get('recipes', [UserRecipeController::class, 'index'])->name('recipes.index');
        Route::get('recipes/create', [UserRecipeController::class, 'create'])->name('recipes.create');
        Route::post('recipes', [UserRecipeController::class, 'store'])->name('recipes.store');
        Route::get('recipes/{recipe}/edit', [UserRecipeController::class, 'edit'])->name('recipes.edit');
        Route::put('recipes/{recipe}', [UserRecipeController::class, 'update'])->name('recipes.update');
        Route::delete('recipes/{recipe}', [UserRecipeController::class, 'destroy'])->name('recipes.destroy');

        // Tips & articles
        Route::get('tips-articles', [UserTipsArticleController::class, 'index'])->name('tips-articles.index');
        Route::get('tips-articles/create', [UserTipsArticleController::class, 'create'])->name('tips-articles.create');
        Route::post('tips-articles', [UserTipsArticleController::class, 'store'])->name('tips-articles.store');
        Route::get('tips-articles/{tipsArticle}/edit', [UserTipsArticleController::class, 'edit'])->name('tips-articles.edit');
        Route::put('tips-articles/{tipsArticle}', [UserTipsArticleController::class, 'update'])->name('tips-articles.update');
        Route::delete('tips-articles/{tipsArticle}', [UserTipsArticleController::class, 'destroy'])->name('tips-articles.destroy');
    });

Route::get('/', [PageController::class, 'index'])->name('home');
Route::get('/resep', [PageController::class, 'recipes'])->name('home.recipes');
Route::get('/resep/mealdb/{meal}', [MealDBRecipeController::class, 'show'])->name('home.recipe-mealdb');
Route::get('/resep/kategori/{recipeCategory:slug}', [PageController::class, 'recipesByCategory'])->name('home.recipes-category');
Route::get('tips-artikel', [PageController::class, 'articles'])->name('home.articles');
Route::get('/tips-artikel/kategori/{tipsArticleCategory:slug}', [PageController::class, 'tipsArticlesByCategory'])->name('home.tips-articles-category');
Route::get('/resep/{recipe}', [PageController::class, 'recipeDetail'])->name('home.recipe-detail');
Route::get('/tips-artikel/{tipsArticle:slug}', [PageController::class, 'articleDetail'])->name('home.article-detail');
Route::redirect('/user', '/user/dashboard');
