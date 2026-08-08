<main class="pt-24">
    <section class="pb-16 bg-slate-50">
        <div class="max-w-7xl mx-auto px-4">
            <h2 class="text-2xl md:text-3xl font-bold text-center mb-2 text-slate-800">
                Resep Populer
            </h2>
            <p class="text-center text-slate-500 mb-8 max-w-xl mx-auto">
                Coba berbagai resep favorit pilihan komunitas yang lezat dan mudah dibuat di rumah.
            </p>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <x-recipes-card />
            </div>

            <div class="pt-10 text-center">
                <a href="/resep"
                   class="inline-block px-8 py-3 bg-orange-500 hover:bg-orange-600 text-white font-semibold rounded-xl shadow-md hover:shadow-lg active:scale-95 transition-all">
                    Lihat Semua Resep
                </a>
            </div>

        </div>
    </section>
</main>