@extends('layouts.admin.app')
@section('title', 'Kategori Artikel')

@section('content')

<div class="mb-3 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
    <div>
        <h1 class="text-2xl font-bold text-slate-800">Kategori Tips & Artikel</h1>
        <p class="text-sm text-slate-500">Kelola daftar kategori untuk pengelompokan tips dan artikel</p>
    </div>
    <a href="{{ route('admin.tips-articles-categories.create') }}"
        class="inline-flex items-center justify-center gap-2 px-4 py-2 bg-orange-500 hover:bg-orange-600 text-white font-medium text-sm rounded-lg transition-colors">
        <i data-lucide="plus" class="w-4 h-4"></i>
        Tambah Kategori
    </a>
</div>

<x-alert-success />

<x-tips-articles-categories-table :tipsArticlesCategories="$tipsArticlesCategories" />

@endsection
