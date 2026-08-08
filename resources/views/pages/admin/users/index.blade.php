@extends('layouts.admin.app')
@section('title', 'Manajemen Akun')

@section('content')

<div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-3">
    <div>
        <h1 class="text-2xl font-bold text-slate-800">Manajemen Akun</h1>
        <p class="text-base text-slate-500">Kelola data pengguna, peran, dan akses sistem</p>
    </div>
    <a href="/admin/users/create"
        class="inline-flex items-center justify-center gap-2 px-4 py-2.5 bg-orange-500 hover:bg-orange-600 text-white font-bold text-sm rounded-xl transition-colors shadow-sm">
        <i data-lucide="user-plus" class="w-4 h-4"></i>
        <span>Tambah Akun</span>
    </a>
</div>

<x-users-table />

@endsection