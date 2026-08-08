@extends('layouts.user.app')
@section('title', 'Resep Saya')

@section('content')

<div class="mb-3 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
    <div>
        <h1 class="text-2xl font-bold text-slate-800">Resep Saya</h1>
        <p class="text-sm text-slate-500">Kelola daftar koleksi resep yang pernah Anda buat</p>
    </div>
    <a href="/admin/resep/create"
        class="inline-flex items-center justify-center gap-2 px-4 py-2 bg-orange-500 hover:bg-orange-600 text-white font-medium text-sm rounded-lg transition-colors">
        <i data-lucide="plus" class="w-4 h-4"></i>
        Tambah Resep
    </a>
</div>

<x-recipes-admin-table />

@endsection