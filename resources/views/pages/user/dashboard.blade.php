@extends('layouts.user.app')
@section('title', 'Dashboard')

@section('content')

<div>
    <h1 class="text-2xl font-bold text-slate-800">Selamat datang, {{ Auth::user()->name }}👋</h1>
    <p class="text-sm text-slate-500 mb-3">Kelola seluruh konten DapurKita Anda dari sini.</p>
</div>
<x-dashboard-user-card :total-recipes="$totalRecipes" :total-articles="$totalArticles" />

<div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
    <x-latest-recipes-user-table :recipes="$latestRecipes" />
    <x-latest-articles-user-table :articles="$latestArticles" />
</div>
@endsection