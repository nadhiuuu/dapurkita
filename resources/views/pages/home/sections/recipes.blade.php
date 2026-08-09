<section class="py-16 md:py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <x-section-title
            title="Resep Terbaru"
            subtitle="Kumpulan resep pilihan dari komunitas DapurKita, diupdate setiap hari."
        />

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse ($latestRecipes as $recipe)
                <x-recipe-card :recipe="$recipe" />
            @empty
                <div class="col-span-full text-center py-16 text-slate-400">
                    <i data-lucide="cooking-pot" class="w-12 h-12 mx-auto mb-4 text-slate-300"></i>
                    <p class="font-semibold">Belum ada resep untuk ditampilkan.</p>
                </div>
            @endforelse
        </div>

        <div class="mt-10 text-center">
            <a href="{{ route('home.recipes') }}"
                class="inline-flex items-center gap-2 px-8 py-3.5 bg-orange-500 hover:bg-orange-600 text-white font-bold rounded-xl shadow-sm transition-all">
                Lihat Semua Resep
                <i data-lucide="arrow-right" class="w-5 h-5"></i>
            </a>
        </div>
    </div>
</section>
