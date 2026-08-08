@extends('layouts.admin.app')
@section('title', 'Tambah Kategori Artikel')

@section('content')

<div class="mb-3 flex items-center justify-between">
    <div>
        <h1 class="text-2xl font-bold text-slate-800">Tambah Kategori Tips & Artikel</h1>
        <p class="text-sm text-slate-500">Buat kategori baru untuk mengelompokkan tips dan artikel</p>
    </div>
</div>

<div class="bg-white rounded-xl border border-slate-200 shadow-sm p-6">
    <form action="/admin/kategori-artikel" method="POST" class="space-y-4">
        @csrf

        <div>
            <label for="nama_kategori" class="block text-sm font-semibold text-slate-700 mb-1">Nama Kategori</label>
            <input type="text" id="nama_kategori" name="nama_kategori" placeholder="Contoh: Info Bahan" required
                class="w-full px-4 py-2 bg-slate-50 border border-slate-200 rounded-lg text-sm text-slate-800 focus:bg-white focus:outline-none focus:border-orange-500 transition-all">
        </div>

        <div class="pt-4 flex justify-end gap-2 border-t border-slate-100">
            <a href="/admin/tips-articles-categories" class="px-4 py-2 bg-slate-100 hover:bg-slate-200 text-slate-700 font-medium text-sm rounded-lg transition-colors">
                Batal
            </a>
            <button type="submit" class="px-4 py-2 bg-orange-500 hover:bg-orange-600 text-white font-medium text-sm rounded-lg transition-colors">
                Simpan
            </button>
        </div>
    </form>
</div>

@endsection