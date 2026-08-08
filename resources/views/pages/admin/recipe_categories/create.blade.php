@extends('layouts.admin.app')
@section('title', 'Tambah Kategori Resep')

@section('content')

<div class="mb-3 flex items-center justify-between">
    <div>
        <h1 class="text-2xl font-bold text-slate-800">Tambah Kategori Resep</h1>
        <p class="text-sm text-slate-500">Buat kategori baru untuk pengelompokan resep</p>
    </div>
</div>

<x-create-recipe-categories-form />

@endsection