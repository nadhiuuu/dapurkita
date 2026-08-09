@extends('layouts.user.app')
@section('title', 'Tambah Resep')

@section('content')

<div class="mb-3 flex items-center justify-between">
    <div>
        <h1 class="text-2xl font-bold text-slate-800">Tambah Resep Baru</h1>
        <p class="text-sm text-slate-500">Buat resep baru, status akan menjadi draft hingga dipublikasikan admin</p>
    </div>
</div>

<x-recipe-form
    :action="route('user.recipes.store')"
    method="POST"
    :recipe="null"
    :categories="$categories"
    :cancelRoute="route('user.recipes.index')"
/>

@endsection
