@extends('layouts.admin.app')
@section('title', 'Tambah Kategori Artikel')

@section('content')

<div class="mb-3 flex items-center justify-between">
    <div>
        <h1 class="text-2xl font-bold text-slate-800">Tambah Kategori Tips & Artikel</h1>
        <p class="text-sm text-slate-500">Buat kategori baru untuk mengelompokkan tips dan artikel</p>
    </div>
</div>

<x-category-form
    :action="route('admin.tips-articles-categories.store')"
    method="POST"
    :category="null"
    nameLabel="Nama Kategori"
    namePlaceholder="Contoh: Info Bahan"
    :cancelRoute="route('admin.tips-articles-categories.index')"
/>

@endsection
