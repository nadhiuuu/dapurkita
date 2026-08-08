@extends('layouts.admin.app')
@section('title', 'Tambah Resep')

@section('content')

<div class="mb-3 flex items-center justify-between">
    <div>
        <h1 class="text-2xl font-bold text-slate-800">Tambah Resep Baru</h1>
        <p class="text-sm text-slate-500">Buat dan publikasikan resep masakan baru</p>
    </div>
</div>
<x-create-recipes-form />
@endsection