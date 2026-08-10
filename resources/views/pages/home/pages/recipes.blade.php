@extends('layouts.home.app')
@section('title', 'Resep Masakan')
@section('content')

<section class="pt-32 pb-16 bg-gradient-to-b from-orange-50 to-slate-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <x-section-title
            title="Semua Resep"
            subtitle="Cari resep dari komunitas DapurKita dan referensi dari TheMealDB."
        />

        <form action="{{ route('home.recipes') }}" method="GET"
            class="max-w-2xl mx-auto mb-12 flex items-center gap-3">
            <div class="relative flex-1">
                <i data-lucide="search" class="w-5 h-5 text-slate-400 absolute left-4 top-1/2 -translate-y-1/2"></i>
                <input type="text" name="search" value="{{ $search }}"
                    placeholder="Cari resep, misalnya: ayam, rendang, cake..."
                    class="w-full pl-12 pr-4 py-3.5 bg-white border border-slate-200 rounded-xl text-sm text-slate-800 shadow-sm focus:outline-none focus:border-orange-500 focus:ring-2 focus:ring-orange-100 transition-all">
            </div>
            <button type="submit"
                class="px-6 py-3.5 bg-orange-500 hover:bg-orange-600 text-white font-semibold text-sm rounded-xl shadow-sm transition-colors">
                Cari
            </button>
            @if ($search !== '')
                <a href="{{ route('home.recipes') }}" title="Hapus pencarian"
                    class="px-3.5 py-3.5 bg-white border border-slate-200 text-slate-600 hover:text-red-500 rounded-xl transition-colors">
                    <i data-lucide="x" class="w-4 h-4"></i>
                </a>
            @endif
        </form>

        @if ($search !== '')
            <div class="mb-12">
                <div class="flex items-center justify-between mb-6">
                    <h2 class="text-xl font-bold text-slate-800">
                        Referensi dari TheMealDB
                        <span class="ml-2 px-2.5 py-1 text-xs font-semibold text-blue-700 bg-blue-100 rounded-full">MealDB</span>
                    </h2>
                    <span class="text-sm text-slate-500">{{ count($mealDbRecipes) }} hasil</span>
                </div>

                @if ($mealDbError)
                    <div class="flex items-center gap-3 bg-red-50 border border-red-200 text-red-700 rounded-xl px-5 py-4 text-sm">
                        <i data-lucide="alert-circle" class="w-5 h-5 shrink-0"></i>
                        {{ $mealDbError }} Silakan coba kembali dalam beberapa saat.
                    </div>
                @elseif (count($mealDbRecipes) === 0)
                    <div class="bg-white border border-slate-200 rounded-xl px-5 py-8 text-center text-slate-400 text-sm">
                        Tidak ada referensi resep dari TheMealDB untuk kata kunci "{{ $search }}".
                    </div>
                @else
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach ($mealDbRecipes as $mealDbRecipe)
                            <x-mealdb-recipe-card :meal="$mealDbRecipe" />
                        @endforeach
                    </div>
                    <p class="mt-4 text-xs text-slate-400 text-center">
                        Data dan gambar resep: TheMealDB (<a href="https://www.themealdb.com/" target="_blank" class="underline hover:text-orange-500">themealdb.com</a>)
                    </p>
                @endif
            </div>
        @endif

        <div class="flex items-center justify-between mb-6">
            <h2 class="text-xl font-bold text-slate-800">
                Resep DapurKita
                <span class="ml-2 px-2.5 py-1 text-xs font-semibold text-emerald-700 bg-emerald-100 rounded-full">DapurKita</span>
            </h2>
            <span class="text-sm text-slate-500">{{ $recipes->total() }} hasil</span>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse ($recipes as $recipe)
                <x-recipe-card :recipe="$recipe" :show-source-badge="true" />
            @empty
                <div class="col-span-full text-center py-16 text-slate-400">
                    <i data-lucide="cooking-pot" class="w-12 h-12 mx-auto mb-4 text-slate-300"></i>
                    <p class="font-semibold">
                        {{ $search !== '' ? 'Tidak ada resep DapurKita untuk kata kunci "'.$search.'".' : 'Belum ada resep untuk ditampilkan.' }}
                    </p>
                </div>
            @endforelse
        </div>

        <div class="mt-12">
            {{ $recipes->links() }}
        </div>
    </div>
</section>

@endsection
