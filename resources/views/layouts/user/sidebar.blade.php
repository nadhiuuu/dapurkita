<div id="sidebar-overlay" onclick="toggleSidebar()" class="fixed inset-0 bg-slate-900/50 z-40 hidden md:hidden transition-opacity"></div>

<aside id="sidebar" class="fixed inset-y-0 left-0 z-50 w-64 bg-slate-900 text-slate-300 flex flex-col justify-between -translate-x-full md:translate-x-0 md:static md:flex-shrink-0 transition-transform duration-300 ease-in-out">
    <div>
        <div class="h-20 flex items-center justify-between px-6 border-b border-slate-800">
            <a href="/user/dashboard" class="flex items-center gap-3">
                <div class="w-9 h-9 bg-orange-500 text-white rounded-xl flex items-center justify-center font-bold">
                    <i data-lucide="cooking-pot" class="w-5 h-5"></i>
                </div>
                <span class="text-lg font-bold text-orange-500">DapurKita</span>
            </a>
            <button onclick="toggleSidebar()" class="md:hidden text-slate-400 hover:text-white">
                <i data-lucide="x" class="w-6 h-6"></i>
            </button>
        </div>

        <nav class="p-4 space-y-1">
            <a href="/user/dashboard" class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-semibold {{ request()->is('user/dashboard*') ? 'bg-orange-500 text-white' : 'hover:bg-slate-800 hover:text-white' }}">
                <i data-lucide="layout-dashboard" class="w-5 h-5"></i>
                <span>Dashboard</span>
            </a>

            <a href="/user/resep" class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-semibold {{ request()->is('user/resep*') ? 'bg-orange-500 text-white' : 'hover:bg-slate-800 hover:text-white' }}">
                <i data-lucide="utensils" class="w-5 h-5"></i>
                <span>Resep Saya</span>
            </a>

            <a href="/user/tips-articles" class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-semibold {{ request()->is('user/tips-articles*') ? 'bg-orange-500 text-white' : 'hover:bg-slate-800 hover:text-white' }}">
                <i data-lucide="newspaper" class="w-5 h-5"></i>
                <span>Tips & Artikel</span>
            </a>
        </nav>
    </div>

    <div class="p-4 border-t border-slate-800">
        <form action="/logout" method="POST">
            @csrf
            <button type="submit" class="w-full flex items-center gap-3 px-4 py-2.5 rounded-xl text-sm font-semibold text-rose-400 hover:bg-rose-500/10 transition-colors">
                <i data-lucide="log-out" class="w-5 h-5"></i>
                <span>Keluar</span>
            </button>
        </form>
    </div>
</aside>