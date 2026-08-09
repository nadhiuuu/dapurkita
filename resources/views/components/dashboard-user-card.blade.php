@props([
    'totalRecipes' => 0,
    'totalArticles' => 0,
])

<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-2 gap-4 mb-6">
    <div class="p-5 bg-white rounded-2xl border border-slate-200 shadow-sm flex items-center justify-between">
        <div>
            <p class="text-base font-semibold text-slate-400">Total Resep Dibuat</p>
            <h3 class="text-2xl font-bold text-slate-800 mt-1">{{ number_format($totalRecipes) }}</h3>
        </div>
        <div class="w-10 h-10 bg-orange-50 text-orange-600 rounded-xl flex items-center justify-center">
            <i data-lucide="utensils" class="w-6 h-6"></i>
        </div>
    </div>

    <div class="p-5 bg-white rounded-2xl border border-slate-200 shadow-sm flex items-center justify-between">
        <div>
            <p class="text-base font-semibold text-slate-400">Total Artikel Dibuat</p>
            <h3 class="text-2xl font-bold text-slate-800 mt-1">{{ number_format($totalArticles) }}</h3>
        </div>
        <div class="w-10 h-10 bg-emerald-50 text-emerald-600 rounded-xl flex items-center justify-center">
            <i data-lucide="newspaper" class="w-6 h-6"></i>
        </div>
    </div>
</div>
