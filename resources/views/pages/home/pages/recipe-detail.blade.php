@extends('layouts.home.app')
@section('title', $recipe->title)
@section('content')

<section class="pt-32 pb-16">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <nav class="text-sm text-slate-500 mb-6">
            <a href="{{ route('home') }}" class="hover:text-orange-500">Beranda</a>
            <span class="mx-2 text-slate-300">/</span>
            <a href="{{ route('home.recipes') }}" class="hover:text-orange-500">Resep</a>
            <span class="mx-2 text-slate-300">/</span>
            <span class="text-slate-700 font-semibold">{{ $recipe->title }}</span>
        </nav>

        <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
            <div class="aspect-video overflow-hidden relative">
                @if ($recipe->image)
                    <img src="{{ asset('storage/' . $recipe->image) }}" alt="{{ $recipe->title }}"
                        class="w-full h-full object-cover">
                @else
                    <div class="w-full h-full bg-gradient-to-br from-orange-100 to-amber-100 flex items-center justify-center">
                        <i data-lucide="cooking-pot" class="w-20 h-20 text-orange-300"></i>
                    </div>
                @endif
                @if ($recipe->category)
                    <span class="absolute top-4 left-4 px-4 py-1.5 text-sm font-semibold text-white bg-orange-500/90 rounded-full backdrop-blur">
                        {{ $recipe->category->name }}
                    </span>
                @endif
            </div>

            <div class="p-6 md:p-10">
                <h1 class="text-3xl md:text-4xl font-extrabold text-slate-900 mb-4">{{ $recipe->title }}</h1>

                <div class="flex flex-wrap items-center gap-4 text-sm text-slate-500 mb-8">
                    <span class="inline-flex items-center gap-1.5">
                        <i data-lucide="user" class="w-4 h-4 text-orange-500"></i>
                        {{ $recipe->user?->name ?? 'DapurKita' }}
                    </span>
                    <span class="inline-flex items-center gap-1.5">
                        <i data-lucide="calendar" class="w-4 h-4 text-orange-500"></i>
                        {{ $recipe->created_at->format('d M Y') }}
                    </span>
                </div>

                <div class="prose prose-lg prose-slate max-w-none text-slate-600 leading-relaxed mb-10">
                    {{ $recipe->description }}
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                    <div class="bg-orange-50/60 border border-orange-100 rounded-2xl p-6">
                        <h2 class="text-xl font-bold text-slate-900 mb-4 inline-flex items-center gap-2">
                            <i data-lucide="shopping-basket" class="w-5 h-5 text-orange-500"></i>
                            Bahan-bahan
                        </h2>
                        <ul class="space-y-2.5">
                            @forelse (collect(is_string($recipe->ingredients) ? explode("\n", $recipe->ingredients) : [])->filter() as $ingredient)
                                <li class="flex items-start gap-3 text-slate-700">
                                    <span class="mt-1.5 w-2 h-2 rounded-full bg-orange-500 shrink-0"></span>
                                    {{ trim($ingredient) }}
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
                            @forelse (collect(is_string($recipe->steps) ? explode("\n", $recipe->steps) : [])->filter() as $index => $step)
                                <li class="flex items-start gap-3 text-slate-700">
                                    <span class="mt-0.5 w-7 h-7 rounded-full bg-emerald-600 text-white text-sm font-bold flex items-center justify-center shrink-0">
                                        {{ $index + 1 }}
                                    </span>
                                    {{ trim($step) }}
                                </li>
                            @empty
                                <li class="text-slate-400 italic">Belum ada langkah yang dicantumkan.</li>
                            @endforelse
                        </ol>
                    </div>
                </div>

                <div class="mt-10 text-center">
                    <a href="{{ route('home.recipes') }}"
                        class="inline-flex items-center gap-2 px-8 py-3.5 bg-orange-500 hover:bg-orange-600 text-white font-bold rounded-xl shadow-sm transition-all">
                        <i data-lucide="arrow-left" class="w-5 h-5"></i>
                        Lihat Resep Lainnya
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
