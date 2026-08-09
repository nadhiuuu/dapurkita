@extends('layouts.user.app')
@section('title', 'Edit Artikel')

@section('content')

<div class="mb-3 flex items-center justify-between">
    <div>
        <h1 class="text-2xl font-bold text-slate-800">Edit Tips & Artikel</h1>
        <p class="text-sm text-slate-500">Perbarui informasi artikel atau tips</p>
    </div>
</div>

<x-tips-articles-form
    :action="route('user.tips-articles.update', $tipsArticle)"
    method="PUT"
    :tipsArticle="$tipsArticle"
    :categories="$categories"
    :cancelRoute="route('user.tips-articles.index')"
/>

@endsection
