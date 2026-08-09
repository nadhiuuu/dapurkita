@extends('layouts.home.app')
@section('title', $tipsArticle->title)
@section('content')

<section class="pt-32 pb-16">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <nav class="text-sm text-slate-500 mb-6">
            <a href="{{ route('home') }}" class="hover:text-emerald-600">Beranda</a>
            <span class="mx-2 text-slate-300">/</span>
            <a href="{{ route('home.articles') }}" class="hover:text-emerald-600">Tips & Artikel</a>
            <span class="mx-2 text-slate-300">/</span>
            <span class="text-slate-700 font-semibold">{{ $tipsArticle->title }}</span>
        </nav>

        <article class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
            <div class="aspect-video overflow-hidden relative">
                @if ($tipsArticle->thumbnail)
                    <img src="{{ asset('storage/' . $tipsArticle->thumbnail) }}" alt="{{ $tipsArticle->title }}"
                        class="w-full h-full object-cover">
                @else
                    <div class="w-full h-full bg-gradient-to-br from-emerald-100 to-teal-100 flex items-center justify-center">
                        <i data-lucide="newspaper" class="w-20 h-20 text-emerald-300"></i>
                    </div>
                @endif
                @if ($tipsArticle->category)
                    <span class="absolute top-4 left-4 px-4 py-1.5 text-sm font-semibold text-white bg-emerald-500/90 rounded-full backdrop-blur">
                        {{ $tipsArticle->category->name }}
                    </span>
                @endif
            </div>

            <div class="p-6 md:p-10">
                <h1 class="text-3xl md:text-4xl font-extrabold text-slate-900 mb-4">{{ $tipsArticle->title }}</h1>

                <div class="flex flex-wrap items-center gap-4 text-sm text-slate-500 mb-8 pb-8 border-b border-slate-100">
                    <span class="inline-flex items-center gap-1.5">
                        <i data-lucide="user" class="w-4 h-4 text-emerald-600"></i>
                        {{ $tipsArticle->user?->name ?? 'DapurKita' }}
                    </span>
                    <span class="inline-flex items-center gap-1.5">
                        <i data-lucide="calendar" class="w-4 h-4 text-emerald-600"></i>
                        {{ $tipsArticle->created_at->format('d M Y') }}
                    </span>
                </div>

                <div class="prose prose-lg prose-slate max-w-none text-slate-600 leading-relaxed whitespace-pre-line">
                    {{ $tipsArticle->content }}
                </div>

                <div class="mt-10 text-center">
                    <a href="{{ route('home.articles') }}"
                        class="inline-flex items-center gap-2 px-8 py-3.5 bg-emerald-600 hover:bg-emerald-700 text-white font-bold rounded-xl shadow-sm transition-all">
                        <i data-lucide="arrow-left" class="w-5 h-5"></i>
                        Baca Artikel Lainnya
                    </a>
                </div>
            </div>
        </article>
    </div>
</section>

@endsection
