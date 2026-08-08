<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.home.landing');
});

Route::get('/resep', function () {
    return view('pages.home.pages.resep');
});

Route::get('tips-artikel', function () {
    return view('pages.home.pages.tips-artikel'); 
});