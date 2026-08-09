@extends('layouts.admin.app')
@section('title', 'Edit Kategori Artikel')

@section('content')

<div class="mb-3 flex items-center justify-between">
    <div>
        <h1 class="text-2xl font-bold text-slate-800">Edit Kategori Tips & Artikel</h1>
        <p class="text-sm text-slate-500">Perbarui nama kategori tips dan artikel</p>
    </div>
</div>

<x-category-form
    :action="route('admin.tips-articles-categories.update', $tipsArticleCategory)"
    method="PUT"
    :category="$tipsArticleCategory"
    nameLabel="Nama Kategori"
    namePlaceholder="Contoh: Info Bahan"
    :cancelRoute="route('admin.tips-articles-categories.index')"
/>

@endsection
