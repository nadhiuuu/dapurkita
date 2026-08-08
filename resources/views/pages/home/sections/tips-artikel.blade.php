<section class="py-12 bg-slate-50">
    <div class="max-w-7xl mx-auto px-4">

        <div class="mb-8">
            <div class="flex items-center gap-2 mb-1">
                <span class="w-3 h-3 rounded-full bg-orange-500 inline-block"></span>
                <span class="text-sm font-bold text-orange-600 uppercase tracking-wider">Berita & Edukasi Kuliner</span>
            </div>
            <h2 class="text-2xl md:text-3xl font-bold text-slate-800">Tips & Artikel Terbaru</h2>
            <p class="text-slate-500 text-sm mt-1">Panduan memasak, trik dapur, dan info gizi terpercaya.</p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 items-start">
            <x-headline-card />

            <div class="lg:col-span-7 flex flex-col justify-between h-full space-y-4">
                <x-artikel-card />

                <div class="flex justify-end pt-2">
                    <a href="/artikel"
                        class="inline-block px-8 py-3 bg-orange-500 hover:bg-orange-600 text-white font-semibold rounded-xl shadow-md hover:shadow-lg active:scale-95 transition-all">
                        Lihat Artikel & Tips Lainnya</i>
                    </a>
                </div>

            </div>

        </div>
    </div>
</section>