@props(['recipe'])

<a href="{{ route('home.recipe-detail', $recipe) }}"
    class="group bg-white rounded-2xl border border-slate-200 overflow-hidden shadow-sm hover:shadow-lg hover:-translate-y-1 transition-all duration-300 flex flex-col">
    <div class="aspect-[4/3] overflow-hidden relative">
        @if ($recipe->image)
            <img src="{{ asset('storage/' . $recipe->image) }}" alt="{{ $recipe->title }}"
                class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
        @else
            <div class="w-full h-full bg-gradient-to-br from-orange-100 to-amber-100 flex items-center justify-center">
                <i data-lucide="cooking-pot" class="w-14 h-14 text-orange-300"></i>
            </div>
        @endif

        @if ($recipe->category)
            <span class="absolute top-3 left-3 px-3 py-1 text-xs font-semibold text-white bg-orange-500/90 rounded-full backdrop-blur">
                {{ $recipe->category->name }}
            </span>
        @endif
    </div>

    <div class="p-5 flex flex-col flex-1">
        <h3 class="font-bold text-lg text-slate-800 group-hover:text-orange-500 transition-colors line-clamp-2">
            {{ $recipe->title }}
        </h3>
        <p class="mt-2 text-sm text-slate-500 line-clamp-2 flex-1">
            {{ Str::limit(strip_tags($recipe->description ?? ''), 100) }}
        </p>

        <div class="mt-4 flex items-center gap-4 text-sm text-slate-500">
            <span class="inline-flex items-center gap-1.5">
                <i data-lucide="list-checks" class="w-4 h-4 text-orange-500"></i>
                {{ is_array($recipe->ingredients) ? count($recipe->ingredients) : (is_string($recipe->ingredients) ? substr_count($recipe->ingredients, "\n") + 1 : 0) }} bahan
            </span>
            <span class="inline-flex items-center gap-1.5">
                <i data-lucide="user" class="w-4 h-4 text-orange-500"></i>
                {{ $recipe->user?->name ?? 'DapurKita' }}
            </span>
        </div>
    </div>
</a>
