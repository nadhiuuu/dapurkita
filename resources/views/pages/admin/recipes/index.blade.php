@extends('layouts.admin.app')
@section('title', 'Manajemen Resep')

@section('content')

<div class="mb-3 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
    <div>
        <h1 class="text-2xl font-bold text-slate-800">Manajemen Resep</h1>
        <p class="text-sm text-slate-500">Kelola daftar resep, filter pencarian, dan status tayang</p>
    </div>
    <a href="{{ route('admin.recipes.create') }}"
        class="inline-flex items-center justify-center gap-2 px-4 py-2 bg-orange-500 hover:bg-orange-600 text-white font-medium text-sm rounded-lg transition-colors">
        <i data-lucide="plus" class="w-4 h-4"></i>
        Tambah Resep
    </a>
</div>

<x-alert-success />
<x-alert-error />

<x-recipes-admin-table :recipes="$recipes" :categories="$categories" />

@endsection
