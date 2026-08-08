<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DapurKita &mdash; Beranda</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="antialiased bg-slate-50 text-slate-900">

    <nav id="main-nav" class="fixed top-0 left-0 w-full z-50 bg-white border-b border-slate-200 shadow-sm transition-all duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                <a href="/" class="flex items-center gap-3 font-bold text-orange-500">
                    <div class="w-10 h-10 bg-orange-500 text-white rounded-xl flex items-center justify-center shadow-sm">
                        <i data-lucide="cooking-pot" class="w-6 h-6"></i>
                    </div>
                    <span class="text-xl">DapurKita</span>
                </a>
                <div class="hidden lg:flex items-center space-x-4">
                    <a href="/" class="text-base font-semibold text-slate-600 hover:text-orange-500 transition-colors">Beranda</a>
                    <a href="/resep" class="text-base font-semibold text-slate-600 hover:text-orange-500 transition-colors">Resep</a>
                    <a href="/tips-artikel" class="text-base font-semibold text-slate-600 hover:text-orange-500 transition-colors">Tips & Artikel</a>
                    
                    <div class="relative group">
                        <button class="text-base font-semibold text-slate-600 group-hover:text-orange-500 flex items-center gap-1 py-2 transition-colors">
                            Tentang <i data-lucide="chevron-down" class="w-4 h-4"></i>
                        </button>
                        <div class="hidden group-hover:block absolute left-0 w-48 bg-white border border-slate-100 rounded-xl shadow-lg p-2">
                            <a href="/tentang" class="block px-4 py-2 text-sm text-slate-700 hover:bg-orange-50 hover:text-orange-600 rounded-lg">Tentang DapurKita</a>
                            <a href="/faq" class="block px-4 py-2 text-sm text-slate-700 hover:bg-orange-50 hover:text-orange-600 rounded-lg">FAQ</a>
                        </div>
                    </div>
                </div>

                <div class="hidden md:flex items-center gap-4">
                    <a href="/login" class="text-sm font-bold text-slate-700 hover:text-orange-500 transition-colors">Masuk</a>
                    <a href="/registrasi" class="px-5 py-2.5 text-sm font-bold text-white bg-orange-500 hover:bg-orange-600 rounded-xl shadow-md transition-all">Daftar</a>
                </div>

                <button id="mobile-btn" class="lg:hidden p-2 text-slate-700">
                    <i data-lucide="menu" class="w-7 h-7"></i>
                </button>
            </div>
        </div>

        <div id="mobile-menu" class="hidden lg:hidden bg-white border-t border-slate-100 px-4 py-6 space-y-3">
            <a href="/" class="block px-4 py-2 font-bold text-orange-500 bg-orange-50 rounded-lg">Beranda</a>
            <a href="/resep" class="block px-4 py-2 font-semibold text-slate-700 hover:bg-orange-50 rounded-lg">Resep</a>
            <a href="/tips-artikel" class="block px-4 py-2 font-semibold text-slate-700 hover:bg-orange-50 rounded-lg">Tips & Artikel</a>
            <a href="/tentang" class="block px-4 py-2 font-semibold text-slate-700 hover:bg-orange-50 rounded-lg">Tentang DapurKita</a>
            <a href="/faq" class="block px-4 py-2 font-semibold text-slate-700 hover:bg-orange-50 rounded-lg">FAQ</a>
            <div class="pt-4 border-t border-slate-100 space-y-2">
                <a href="/login" class="block w-full py-2.5 text-center font-bold text-slate-700 border border-slate-200 rounded-xl">Masuk</a>
                <a href="/register" class="block w-full py-2.5 text-center font-bold text-white bg-orange-500 rounded-xl">Daftar</a>
            </div>
        </div>
    </nav>

    <script>
        const btn = document.getElementById('mobile-btn');
        const menu = document.getElementById('mobile-menu');

        btn.addEventListener('click', () => {
            menu.classList.toggle('hidden');
        });
    </script>
</body>

</html>