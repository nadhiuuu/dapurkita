@extends('layouts.home.app')
@section('title', $tipsArticleCategory->name)
@section('content')

<section class="pt-32 pb-16 bg-gradient-to-b from-emerald-50 to-slate-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <nav class="text-sm text-slate-500 mb-6">
            <a href="{{ route('home') }}" class="hover:text-orange-500">Beranda</a>
            <span class="mx-2 text-slate-300">/</span>
            <a href="{{ route('home.articles') }}" class="hover:text-orange-500">Tips & Artikel</a>
            <span class="mx-2 text-slate-300">/</span>
            <span class="text-slate-700 font-semibold">{{ $tipsArticleCategory->name }}</span>
        </nav>

        <x-section-title
            :title="$tipsArticleCategory->name"
            subtitle="Kumpulan tips dan artikel DapurKita pada kategori {{ $tipsArticleCategory->name }}."
        />

        <div class="flex items-center justify-between mb-6">
            <h2 class="text-xl font-bold text-slate-800">
                Artikel Kategori {{ $tipsArticleCategory->name }}
                <span class="ml-2 px-2.5 py-1 text-xs font-semibold text-emerald-700 bg-emerald-100 rounded-full">DapurKita</span>
            </h2>
            <span class="text-sm text-slate-500">{{ $tipsArticles->total() }} hasil</span>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse ($tipsArticles as $article)
                <x-article-card :article="$article" />
            @empty
                <div class="col-span-full text-center py-16 text-slate-400">
                    <i data-lucide="newspaper" class="w-12 h-12 mx-auto mb-4 text-slate-300"></i>
                    <p class="font-semibold">Belum ada artikel pada kategori ini.</p>
                </div>
            @endforelse
        </div>

        <div class="mt-12">
            {{ $tipsArticles->links() }}
        </div>
    </div>
</section>

@endsection
