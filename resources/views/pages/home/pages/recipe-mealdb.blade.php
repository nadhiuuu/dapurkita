@extends('layouts.home.app')
@section('title', $recipe ? $recipe['title'] : 'Referensi Resep')
@section('content')

<section class="pt-32 pb-16">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">

        @if (! $recipe)
            <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-10 text-center">
                <div class="w-16 h-16 mx-auto mb-4 rounded-full {{ $isError ? 'bg-red-100' : 'bg-slate-100' }} flex items-center justify-center">
                    <i data-lucide="{{ $isError ? 'cloud-off' : 'search-x' }}"
                        class="w-8 h-8 {{ $isError ? 'text-red-500' : 'text-slate-400' }}"></i>
                </div>
                <p class="font-semibold text-slate-700 mb-2">{{ $message }}</p>
                <a href="{{ route('home.recipes') }}"
                    class="inline-flex items-center gap-2 mt-4 px-6 py-3 bg-orange-500 hover:bg-orange-600 text-white font-bold rounded-xl shadow-sm transition-all">
                    <i data-lucide="arrow-left" class="w-5 h-5"></i>
                    Kembali ke Daftar Resep
                </a>
            </div>
        @else
            <nav class="text-sm text-slate-500 mb-6">
                <a href="{{ route('home') }}" class="hover:text-orange-500">Beranda</a>
                <span class="mx-2 text-slate-300">/</span>
                <a href="{{ route('home.recipes') }}" class="hover:text-orange-500">Resep</a>
                <span class="mx-2 text-slate-300">/</span>
                <span class="text-slate-700 font-semibold">{{ $recipe['title'] }}</span>
            </nav>

            <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
                <div class="aspect-video overflow-hidden relative">
                    @if ($recipe['image'])
                        <img src="{{ $recipe['image'] }}" alt="{{ $recipe['title'] }}"
                            class="w-full h-full object-cover">
                    @else
                        <div class="w-full h-full bg-gradient-to-br from-blue-100 to-indigo-100 flex items-center justify-center">
                            <i data-lucide="utensils" class="w-20 h-20 text-blue-300"></i>
                        </div>
                    @endif

                    <span class="absolute top-4 left-4 px-4 py-1.5 text-sm font-semibold text-white bg-blue-600/90 rounded-full backdrop-blur">
                        Referensi TheMealDB
                    </span>
                </div>

                <div class="p-6 md:p-10">
                    <h1 class="text-3xl md:text-4xl font-extrabold text-slate-900 mb-4">{{ $recipe['title'] }}</h1>

                    <div class="flex flex-wrap items-center gap-4 text-sm text-slate-500 mb-8">
                        @if ($recipe['category'])
                            <span class="inline-flex items-center gap-1.5">
                                <i data-lucide="tag" class="w-4 h-4 text-blue-500"></i>
                                {{ $recipe['category'] }}
                            </span>
                        @endif
                        @if ($recipe['area'])
                            <span class="inline-flex items-center gap-1.5">
                                <i data-lucide="globe" class="w-4 h-4 text-blue-500"></i>
                                {{ $recipe['area'] }}
                            </span>
                        @endif
                        <a href="https://www.themealdb.com/meal/{{ $recipe['id'] }}" target="_blank"
                            class="inline-flex items-center gap-1.5 text-blue-600 hover:text-blue-800">
                            <i data-lucide="external-link" class="w-4 h-4"></i>
                            Halaman TheMealDB
                        </a>
                    </div>

                    @auth
                        @if (Auth::user()->role === 'admin')
                            <div class="mb-10 bg-blue-50 border border-blue-200 rounded-xl p-4 flex flex-col sm:flex-row sm:items-center gap-4">
                                <div class="flex-1">
                                    <p class="font-semibold text-slate-800 text-sm">Ingin menyimpan resep ini?</p>
                                    <p class="text-xs text-slate-600 mt-0.5">
                                        Klik tombol di samping untuk mengisi form resep DapurKita. Anda tetap dapat mengedit sebelum menyimpan.
                                    </p>
                                </div>
                                <a href="{{ route('admin.recipes.import', $recipe['id']) }}"
                                    class="inline-flex items-center justify-center gap-2 px-5 py-2.5 bg-blue-600 hover:bg-blue-700 text-white font-semibold text-sm rounded-lg transition-colors shrink-0">
                                    <i data-lucide="download" class="w-4 h-4"></i>
                                    Import ke DapurKita
                                </a>
                            </div>
                        @endif
                    @endauth

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                        <div class="bg-orange-50/60 border border-orange-100 rounded-2xl p-6">
                            <h2 class="text-xl font-bold text-slate-900 mb-4 inline-flex items-center gap-2">
                                <i data-lucide="shopping-basket" class="w-5 h-5 text-orange-500"></i>
                                Bahan-bahan
                            </h2>
                            <ul class="space-y-2.5">
                                @forelse ($recipe['ingredients'] as $ingredient)
                                    <li class="flex items-start gap-3 text-slate-700">
                                        <span class="mt-1.5 w-2 h-2 rounded-full bg-orange-500 shrink-0"></span>
                                        {{ $ingredient }}
                                    </li>
                                @empty
                                    <li class="text-slate-400 italic">Belum ada bahan yang dicantumkan.</li>
                                @endforelse
                            </ul>
                        </div>

                        <div class="bg-emerald-50/60 border border-emerald-100 rounded-2xl p-6">
                            <h2 class="text-xl font-bold text-slate-900 mb-4 inline-flex items-center gap-2">
                                <i data-lucide="list-ordered" class="w-5 h-5 text-emerald-600"></i>
                                Cara Membuat
                            </h2>
                            <ol class="space-y-4">
                                @forelse ($recipe['steps'] as $index => $step)
                                    <li class="flex items-start gap-3 text-slate-700">
                                        <span class="mt-0.5 w-7 h-7 rounded-full bg-emerald-600 text-white text-sm font-bold flex items-center justify-center shrink-0">
                                            {{ $index + 1 }}
                                        </span>
                                        {{ $step }}
                                    </li>
                                @empty
                                    <li class="text-slate-400 italic">Belum ada langkah yang dicantumkan.</li>
                                @endforelse
                            </ol>
                        </div>
                    </div>

                    <div class="mt-10 flex flex-col sm:flex-row items-center justify-center gap-3">
                        @if ($recipe['youtube'])
                            <a href="{{ $recipe['youtube'] }}" target="_blank"
                                class="inline-flex items-center gap-2 px-8 py-3.5 bg-red-500 hover:bg-red-600 text-white font-bold rounded-xl shadow-sm transition-all">
                                <i data-lucide="video" class="w-5 h-5"></i>
                                Tonton Video
                            </a>
                        @endif

                        @if ($recipe['source'])
                            <a href="{{ $recipe['source'] }}" target="_blank"
                                class="inline-flex items-center gap-2 px-8 py-3.5 bg-slate-100 hover:bg-slate-200 text-slate-700 font-bold rounded-xl shadow-sm transition-all">
                                <i data-lucide="external-link" class="w-5 h-5"></i>
                                Sumber Asli
                            </a>
                        @endif

                        <a href="{{ route('home.recipes', ['search' => request('search')]) }}"
                            class="inline-flex items-center gap-2 px-8 py-3.5 bg-orange-500 hover:bg-orange-600 text-white font-bold rounded-xl shadow-sm transition-all">
                            <i data-lucide="arrow-left" class="w-5 h-5"></i>
                            Lihat Resep Lainnya
                        </a>
                    </div>

                    <p class="mt-8 text-center text-xs text-slate-400">
                        Data dan gambar resep: TheMealDB (<a href="https://www.themealdb.com/" target="_blank" class="underline hover:text-orange-500">https://www.themealdb.com/</a>)
                    </p>
                </div>
            </div>
        @endif
    </div>
</section>

@endsection
