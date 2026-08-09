@extends('layouts.home.app')
@section('title', 'Tips & Artikel')
@section('content')

<section class="pt-32 pb-16 bg-gradient-to-b from-emerald-50 to-slate-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <x-section-title
            title="Tips & Artikel"
            subtitle="Tips dapur, teknik memasak, dan artikel menarik untuk menemani aktivitas memasak Anda."
        />

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse ($tipsArticles as $article)
                <x-article-card :article="$article" />
            @empty
                <div class="col-span-full text-center py-16 text-slate-400">
                    <i data-lucide="newspaper" class="w-12 h-12 mx-auto mb-4 text-slate-300"></i>
                    <p class="font-semibold">Belum ada artikel untuk ditampilkan.</p>
                </div>
            @endforelse
        </div>

        <div class="mt-12">
            {{ $tipsArticles->links() }}
        </div>
    </div>
</section>

@endsection
