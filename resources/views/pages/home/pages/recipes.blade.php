@include('layouts.home.navbar')

<main class="pt-24">
    <section class="pb-16 bg-slate-50">
        <div class="max-w-7xl mx-auto px-4">
            <h2 class="text-2xl md:text-3xl font-bold text-center mb-2 text-slate-800">
                Resep Populer
            </h2>
            <p class="text-center text-slate-500 mb-6 mx-auto">
                Coba berbagai resep favorit pilihan komunitas yang lezat dan mudah dibuat di rumah.
            </p>

            <div class="max-w-md mx-auto mb-10">
                <form action="/resep" method="GET" class="relative flex items-center">
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari resep masakan..."
                        class="w-full pl-11 pr-24 py-3 bg-white border border-slate-200 rounded-xl text-slate-700 placeholder-slate-400 text-sm focus:outline-none focus:border-orange-500 focus:ring-1 focus:ring-orange-500 shadow-sm transition-all">
                    <div class="absolute left-4 text-slate-400 pointer-events-none">
                        <i data-lucide="search" class="w-4 h-4"></i>
                    </div>
                    <button type="submit"
                        class="absolute right-2 px-4 py-1 bg-orange-500 hover:bg-orange-600 text-white text-sm font-bold rounded-lg transition-colors shadow-sm">
                        Cari
                    </button>
                </form>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <x-resep-card />
            </div>

        </div>
    </section>
</main>

@include('layouts.home.footer')