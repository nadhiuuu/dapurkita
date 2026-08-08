<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.home.landing');
});

Route::get('/resep', function () {
    return view('pages.home.pages.recipes');
});

Route::get('tips-artikel', function () {
    return view('pages.home.pages.tips-articles');
});

Route::get('/login', function () {
    return view('pages.auth.login');
});

Route::get('registrasi', function () {
    return view('pages.auth.registrasi');
});

Route::redirect('/admin', '/admin/dashboard');
Route::prefix('admin')->group(function () {
    Route::get('/dashboard', function () {
        return view('pages.admin.dashboard');
    })->name('admin.dashboard');
    Route::get('/users', function () {
        return view('pages.admin.users.index');
    })->name('admin.users');
    Route::get('/users/create', function () {
        return view('pages.admin.users.create');
    });
    Route::get('/users/edit', function () {
        return view('pages.admin.users.edit');
    });
    Route::get('/resep', function () {
        return view('pages.admin.recipes.index');
    });
    Route::get('/resep/create', function () {
        return view('pages.admin.recipes.create');
    });
    Route::get('/resep/edit', function () {
        return view('pages.admin.recipes.edit');
    });
    Route::get('/tips-articles', function () {
        return view('pages.admin.tips_articles.index');
    });
    Route::get('/tips-articles/create', function () {
        return view('pages.admin.tips_articles.create');
    });
    Route::get('/tips-articles/edit', function () {
        return view('pages.admin.tips_articles.edit');
    });
    Route::get('/recipe-categories', function () {
        return view('pages.admin.recipe_categories.index');
    });
    Route::get('/recipe-categories/create', function () {
        return view('pages.admin.recipe_categories.create');
    });
    Route::get('/recipe-categories/edit', function () {
        return view('pages.admin.recipe_categories.edit');
    });
    Route::get('/tips-articles-categories', function () {
        return view('pages.admin.tips_articles_categories.index');
    });
    Route::get('/tips-articles-categories/create', function () {
        return view('pages.admin.tips_articles_categories.create');
    });
    Route::get('/tips-articles-categories/edit', function () {
        return view('pages.admin.tips_articles_categories.edit');
    });

});

Route::redirect('/user', '/user/dashboard');
Route::prefix('user')->group(function () {
    Route::get('/dashboard', function () {
        return view('pages.user.dashboard');
    })->name('user.dashboard');

    Route::get('/resep', function () {
        return view('pages.user.recipes.index');
    });
    Route::get('/resep/create', function () {
        return view('pages.user.recipes.create');
    });
    Route::get('/resep/edit', function () {
        return view('pages.user.recipes.edit');
    });

    Route::get('/tips-articles', function () {
        return view('pages.user.tips_articles.index');
    });
    Route::get('/tips-articles', function () {
        return view('pages.user.tips_articles.create');
    });
    Route::get('/tips-articles', function () {
        return view('pages.user.tips_articles.edit');
    });
});