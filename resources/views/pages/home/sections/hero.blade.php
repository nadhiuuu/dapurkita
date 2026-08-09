<section class="relative text-white overflow-hidden min-h-screen flex items-center">
    <div class="absolute inset-0">
        <img src="{{ asset('images/Background.jpg') }}"
            class="w-full h-full object-cover" alt="Latar belakang dapur" />
        <div class="absolute inset-0 bg-gradient-to-b md:bg-gradient-to-r from-amber-950/90 via-amber-900/90 to-transparent"></div>
    </div>
    <div class="relative w-full max-w-7xl mx-auto px-6 sm:px-8 lg:px-12 pt-32 pb-10 md:py-0">
        <div class="max-w-2xl">
            <h1 class="text-4xl sm:text-5xl md:text-6xl font-extrabold leading-tight mb-4">
                Temukan inspirasi, <span class="text-orange-400">bagikan kreasi</span>
            </h1>
            <p class="text-start text-lg md:text-xl text-orange-100 mb-8 leading-relaxed">
                Temukan inspirasi dari berbagai kreasi yang ada, dan bagikan kreasi Anda sendiri untuk menginspirasi orang lain. Bergabunglah dengan komunitas kami dan jadilah bagian dari perjalanan kreatif ini.
            </p>
            <div class="flex flex-wrap items-center gap-4">
                <a href="{{ route('home.recipes') }}"
                    class="inline-flex items-center gap-2 px-8 py-4 bg-orange-500 hover:bg-orange-600 text-white font-bold rounded-xl shadow-lg shadow-orange-900/30 transition-all">
                    <i data-lucide="search" class="w-5 h-5"></i>
                    Cari Resep
                </a>
            </div>
        </div>
    </div>
</section>
