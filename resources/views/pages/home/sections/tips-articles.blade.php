<section class="py-16 md:py-20 bg-gradient-to-b from-slate-50 to-emerald-50/50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <x-section-title
            title="Tips & Artikel"
            subtitle="Trik dapur, teknik memasak, dan artikel menarik untuk menemani aktivitas memasak Anda."
        />

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse ($latestArticles as $article)
                <x-article-card :article="$article" />
            @empty
                <div class="col-span-full text-center py-16 text-slate-400">
                    <i data-lucide="newspaper" class="w-12 h-12 mx-auto mb-4 text-slate-300"></i>
                    <p class="font-semibold">Belum ada artikel untuk ditampilkan.</p>
                </div>
            @endforelse
        </div>

        <div class="mt-10 text-center">
            <a href="{{ route('home.articles') }}"
                class="inline-flex items-center gap-2 px-8 py-3.5 bg-emerald-600 hover:bg-emerald-700 text-white font-bold rounded-xl shadow-sm transition-all">
                Baca Semua Artikel
                <i data-lucide="arrow-right" class="w-5 h-5"></i>
            </a>
        </div>
    </div>
</section>
