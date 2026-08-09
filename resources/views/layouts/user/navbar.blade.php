<header
    class="h-20 bg-white border-b border-slate-200 px-4 sm:px-6 flex items-center justify-between sticky top-0 z-10">
    <div class="flex items-center gap-3">
        <button onclick="toggleSidebar()"
            class="md:hidden p-2 rounded-xl text-slate-600 hover:bg-slate-100 focus:outline-none">
            <i data-lucide="menu" class="w-6 h-6"></i>
        </button>

        <h1 class="text-lg sm:text-xl font-bold text-slate-800">Panel Pengguna</h1>
    </div>

    <div class="flex items-center gap-3">
        <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&bg=f97316&color=fff"
            class="w-9 h-9 rounded-full" alt="{{ Auth::user()->name }}">

        <div class="text-left hidden sm:block">
            <p class="text-sm font-bold text-slate-800">
                {{ Auth::user()->name }}
            </p>

            <p class="text-xs text-slate-400">
                {{ Auth::user()->email }}
            </p>
        </div>
    </div>
</header>