@extends('layouts.admin.app')
@section('title', 'Edit Kategori Resep')

@section('content')

<div class="mb-3 flex items-center justify-between">
    <div>
        <h1 class="text-2xl font-bold text-slate-800">Edit Kategori Resep</h1>
        <p class="text-sm text-slate-500">Perbarui nama kategori resep</p>
    </div>
</div>

<x-category-form
    :action="route('admin.recipe-categories.update', $recipeCategory)"
    method="PUT"
    :category="$recipeCategory"
    :cancelRoute="route('admin.recipe-categories.index')"
/>

@endsection
