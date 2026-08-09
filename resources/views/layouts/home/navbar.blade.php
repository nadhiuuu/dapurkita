<nav class="fixed top-0 left-0 w-full z-50 bg-white/95 backdrop-blur border-b border-slate-200 shadow-sm">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-20">
            <a href="{{ route('home') }}" class="flex items-center gap-3 font-bold text-orange-500">
                <div class="w-10 h-10 bg-orange-500 text-white rounded-xl flex items-center justify-center shadow-sm">
                    <i data-lucide="cooking-pot" class="w-6 h-6"></i>
                </div>
                <span class="text-xl">DapurKita</span>
            </a>

            <div class="hidden lg:flex items-center space-x-6">
                <a href="{{ route('home') }}"
                    class="text-base font-semibold text-slate-600 hover:text-orange-500 transition-colors {{ request()->routeIs('home') ? 'text-orange-500' : '' }}">
                    Beranda
                </a>
                <a href="{{ route('home.recipes') }}"
                    class="text-base font-semibold text-slate-600 hover:text-orange-500 transition-colors {{ request()->routeIs('home.recipes*') ? 'text-orange-500' : '' }}">
                    Resep
                </a>
                <a href="{{ route('home.articles') }}"
                    class="text-base font-semibold text-slate-600 hover:text-orange-500 transition-colors {{ request()->routeIs('home.articles*') ? 'text-orange-500' : '' }}">
                    Tips & Artikel
                </a>
                <a href="/#tentang"
                    class="text-base font-semibold text-slate-600 hover:text-orange-500 transition-colors">
                    Tentang
                </a>
            </div>

            <div class="hidden md:flex items-center gap-3">
                @auth
                    <a href="{{ Auth::user()->role === 'admin' ? route('admin.dashboard') : route('user.dashboard') }}"
                        class="inline-flex items-center gap-2 px-5 py-2.5 text-sm font-semibold text-white bg-orange-500 hover:bg-orange-600 rounded-xl transition-all">
                        <i data-lucide="layout-dashboard" class="w-4 h-4"></i>
                        Dashboard
                    </a>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit"
                            class="inline-flex items-center gap-2 px-5 py-2.5 text-sm font-semibold text-slate-700 border border-slate-200 hover:bg-slate-100 rounded-xl transition-all">
                            <i data-lucide="log-out" class="w-4 h-4"></i>
                            Logout
                        </button>
                    </form>
                @else
                    <a href="{{ route('login') }}"
                        class="text-sm font-semibold text-slate-700 hover:text-orange-500 transition-colors">
                        Masuk
                    </a>
                    <a href="{{ route('register') }}"
                        class="px-5 py-2.5 text-sm font-semibold text-white bg-orange-500 hover:bg-orange-600 rounded-xl shadow-sm transition-all">
                        Daftar
                    </a>
                @endauth
            </div>

            <button id="mobile-btn" class="lg:hidden p-2 text-slate-700 hover:text-orange-500 transition-colors">
                <i data-lucide="menu" class="w-7 h-7"></i>
            </button>
        </div>
    </div>

    <div id="mobile-menu" class="hidden lg:hidden bg-white border-t border-slate-100 px-4 py-6 space-y-3">
        <a href="{{ route('home') }}" class="block px-4 py-2 font-semibold text-slate-700 hover:bg-orange-50 rounded-lg {{ request()->routeIs('home') ? 'text-orange-500 bg-orange-50' : '' }}">Beranda</a>
        <a href="{{ route('home.recipes') }}" class="block px-4 py-2 font-semibold text-slate-700 hover:bg-orange-50 rounded-lg {{ request()->routeIs('home.recipes*') ? 'text-orange-500 bg-orange-50' : '' }}">Resep</a>
        <a href="{{ route('home.articles') }}" class="block px-4 py-2 font-semibold text-slate-700 hover:bg-orange-50 rounded-lg {{ request()->routeIs('home.articles*') ? 'text-orange-500 bg-orange-50' : '' }}">Tips & Artikel</a>
        <a href="/#tentang" class="block px-4 py-2 font-semibold text-slate-700 hover:bg-orange-50 rounded-lg">Tentang</a>

        <div class="pt-4 border-t border-slate-100 space-y-2">
            @auth
                <a href="{{ Auth::user()->role === 'admin' ? route('admin.dashboard') : route('user.dashboard') }}"
                    class="block w-full py-2.5 text-center font-semibold text-white bg-orange-500 hover:bg-orange-600 rounded-xl">
                    Dashboard
                </a>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit"
                        class="block w-full py-2.5 text-center font-semibold text-slate-700 border border-slate-200 hover:bg-slate-100 rounded-xl">
                        Logout
                    </button>
                </form>
            @else
                <a href="{{ route('login') }}"
                    class="block w-full py-2.5 text-center font-semibold text-slate-700 border border-slate-200 rounded-xl">
                    Masuk
                </a>
                <a href="{{ route('register') }}"
                    class="block w-full py-2.5 text-center font-semibold text-white bg-orange-500 rounded-xl">
                    Daftar
                </a>
            @endauth
        </div>
    </div>
</nav>

<script>
    const mobileBtn = document.getElementById('mobile-btn');
    const mobileMenu = document.getElementById('mobile-menu');

    mobileBtn.addEventListener('click', () => {
        mobileMenu.classList.toggle('hidden');
    });
</script>
