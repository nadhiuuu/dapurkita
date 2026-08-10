@props(['meal'])

<a href="{{ route('home.recipe-mealdb', ['meal' => $meal['id'], 'search' => request('search')]) }}"
    class="group bg-white rounded-2xl border border-slate-200 overflow-hidden shadow-sm hover:shadow-lg hover:-translate-y-1 transition-all duration-300 flex flex-col">
    <div class="aspect-[4/3] overflow-hidden relative">
        @if ($meal['image'])
            <img src="{{ $meal['image'] }}" alt="{{ $meal['title'] }}" loading="lazy"
                class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
        @else
            <div class="w-full h-full bg-gradient-to-br from-blue-100 to-indigo-100 flex items-center justify-center">
                <i data-lucide="utensils" class="w-14 h-14 text-blue-300"></i>
            </div>
        @endif

        <span class="absolute top-3 left-3 px-3 py-1 text-xs font-semibold text-blue-800 bg-blue-100/95 rounded-full backdrop-blur">
            {{ $meal['category'] ?? 'TheMealDB' }}
        </span>

        <span class="absolute top-3 right-3 px-2.5 py-1 text-xs font-semibold text-blue-800 bg-blue-100/95 rounded-full backdrop-blur">
            MealDB
        </span>
    </div>

    <div class="p-5 flex flex-col flex-1">
        <h3 class="font-bold text-lg text-slate-800 group-hover:text-blue-600 transition-colors line-clamp-2">
            {{ $meal['title'] }}
        </h3>
        <p class="mt-2 text-sm text-slate-500 line-clamp-2 flex-1">
            {{ $meal['area'] ?? 'Kuliner dunia' }} &middot; Referensi resep dari TheMealDB
        </p>

        <div class="mt-4 flex items-center gap-4 text-sm text-slate-500">
            <span class="inline-flex items-center gap-1.5">
                <i data-lucide="list-checks" class="w-4 h-4 text-blue-500"></i>
                {{ count($meal['ingredients']) }} bahan
            </span>
            <span class="inline-flex items-center gap-1.5">
                <i data-lucide="utensils-crossed" class="w-4 h-4 text-blue-500"></i>
                {{ count($meal['steps']) }} langkah
            </span>
        </div>
    </div>
</a>
