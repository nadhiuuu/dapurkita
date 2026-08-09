@extends('layouts.admin.app')
@section('title', 'Dashboard')

@section('content')

<div>
    <h1 class="text-2xl font-bold text-slate-800">Selamat datang, {{ Auth::user()->name }}👋</h1>
    <p class="text-sm text-slate-500 mb-3">Kelola seluruh konten DapurKita dari sini.</p>
</div>
<x-dashboard-admin-card :total-users="$totalUsers" :total-recipes="$totalRecipes" :total-articles="$totalArticles" />

<div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
    <x-latest-recipes-admin-table :recipes="$latestRecipes" />
    <x-latest-articles-admin-table :articles="$latestArticles" />
</div>
@endsection