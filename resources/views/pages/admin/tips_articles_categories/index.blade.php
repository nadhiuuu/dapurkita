@extends('layouts.admin.app')
@section('title', 'Kategori Artikel')

@section('content')

<div class="mb-3 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
    <div>
        <h1 class="text-2xl font-bold text-slate-800">Kategori Tips & Artikel</h1>
        <p class="text-sm text-slate-500">Kelola daftar kategori untuk pengelompokan tips dan artikel</p>
    </div>
    <a href="/admin/tips-articles-categories/create"
        class="inline-flex items-center justify-center gap-2 px-4 py-2 bg-orange-500 hover:bg-orange-600 text-white font-medium text-sm rounded-lg transition-colors">
        <i data-lucide="plus" class="w-4 h-4"></i>
        Tambah Kategori
    </a>
</div>

<div class="bg-white rounded-xl border border-slate-200 shadow-sm p-4 mb-4">
    <form action="" method="GET" class="flex flex-col sm:flex-row gap-3">
        <div class="relative w-full sm:w-80">
            <i data-lucide="search" class="w-4 h-4 absolute left-3 top-1/2 -translate-y-1/2 text-slate-400"></i>
            <input type="text" name="search" placeholder="Cari nama kategori..."
                class="w-full pl-9 pr-4 py-2 bg-slate-50 border border-slate-200 rounded-lg text-sm focus:outline-none focus:border-orange-500 transition-colors">
        </div>
    </form>
</div>

<div class="bg-white rounded-xl border border-slate-200 shadow-sm overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse whitespace-nowrap">
            <thead>
                <tr class="bg-slate-50 border-b border-slate-200 text-sm font-semibold text-slate-600">
                    <th class="py-3 px-4 w-16">No</th>
                    <th class="py-3 px-4">Nama Kategori</th>
                    <th class="py-3 px-4">Slug</th>
                    <th class="py-3 px-4">Jumlah Artikel</th>
                    <th class="py-3 px-4 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100 text-sm text-slate-700">

                <tr class="hover:bg-slate-50 transition-colors">
                    <td class="py-3.5 px-4 text-slate-500">1</td>
                    <td class="py-3.5 px-4 font-medium text-slate-800">Tips Dapur</td>
                    <td class="py-3.5 px-4 text-slate-500">tips-dapur</td>
                    <td class="py-3.5 px-4">
                        <span class="px-2.5 py-1 bg-slate-100 text-slate-700 text-xs font-semibold rounded-full">15
                            Artikel</span>
                    </td>
                    <td class="py-3.5 px-4">
                        <div class="flex items-center justify-center gap-2">
                            <a href="/admin/kategori-artikel/1/edit"
                                class="p-1.5 text-slate-500 hover:text-orange-500 rounded hover:bg-orange-50 transition-colors">
                                <i data-lucide="edit" class="w-4 h-4"></i>
                            </a>
                            <button
                                class="p-1.5 text-slate-500 hover:text-red-500 rounded hover:bg-red-50 transition-colors">
                                <i data-lucide="trash-2" class="w-4 h-4"></i>
                            </button>
                        </div>
                    </td>
                </tr>

                <tr class="hover:bg-slate-50 transition-colors">
                    <td class="py-3.5 px-4 text-slate-500">2</td>
                    <td class="py-3.5 px-4 font-medium text-slate-800">Kesehatan & Gizi</td>
                    <td class="py-3.5 px-4 text-slate-500">kesehatan-gizi</td>
                    <td class="py-3.5 px-4">
                        <span class="px-2.5 py-1 bg-slate-100 text-slate-700 text-xs font-semibold rounded-full">9
                            Artikel</span>
                    </td>
                    <td class="py-3.5 px-4">
                        <div class="flex items-center justify-center gap-2">
                            <a href="/admin/kategori-artikel/2/edit"
                                class="p-1.5 text-slate-500 hover:text-orange-500 rounded hover:bg-orange-50 transition-colors">
                                <i data-lucide="edit" class="w-4 h-4"></i>
                            </a>
                            <button
                                class="p-1.5 text-slate-500 hover:text-red-500 rounded hover:bg-red-50 transition-colors">
                                <i data-lucide="trash-2" class="w-4 h-4"></i>
                            </button>
                        </div>
                    </td>
                </tr>

            </tbody>
        </table>
    </div>

    <div class="p-4 border-t border-slate-200 flex flex-col sm:flex-row items-center justify-between gap-3 text-sm">
        <span class="text-slate-500 text-xs sm:text-sm">Menampilkan 1 - 2 dari 2 data</span>
        <div class="flex items-center gap-1">
            <button class="px-3 py-1.5 border border-slate-200 text-slate-500 rounded-md disabled:opacity-50"
                disabled>Sebelumnya</button>
            <button class="px-3 py-1.5 bg-orange-500 text-white rounded-md font-medium">1</button>
            <button class="px-3 py-1.5 border border-slate-200 text-slate-500 rounded-md disabled:opacity-50"
                disabled>Selanjutnya</button>
        </div>
    </div>
</div>

@endsection