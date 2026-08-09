@extends('layouts.user.app')
@section('title', 'Tambah Artikel')

@section('content')

<div class="mb-3 flex items-center justify-between">
    <div>
        <h1 class="text-2xl font-bold text-slate-800">Tambah Tips & Artikel Baru</h1>
        <p class="text-sm text-slate-500">Buat artikel baru, status akan menjadi draft hingga dipublikasikan admin</p>
    </div>
</div>

<x-tips-articles-form
    :action="route('user.tips-articles.store')"
    method="POST"
    :tipsArticle="null"
    :categories="$categories"
    :cancelRoute="route('user.tips-articles.index')"
/>

@endsection
