@extends('layouts.admin.app')
@section('title', 'Edit Artikel')

@section('content')

<div class="mb-3 flex items-center justify-between">
    <div>
        <h1 class="text-2xl font-bold text-slate-800">Edit Artikel</h1>
        <p class="text-sm text-slate-500">Perbarui informasi artikel atau tips</p>
    </div>
</div>

<x-edit-tips-articles-form />

@endsection