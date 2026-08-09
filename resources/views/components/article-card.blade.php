@props(['article'])

<a href="{{ route('home.article-detail', $article) }}"
    class="group bg-white rounded-2xl border border-slate-200 overflow-hidden shadow-sm hover:shadow-lg hover:-translate-y-1 transition-all duration-300 flex flex-col">
    <div class="aspect-[16/9] overflow-hidden relative">
        @if ($article->thumbnail)
            <img src="{{ asset('storage/' . $article->thumbnail) }}" alt="{{ $article->title }}"
                class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
        @else
            <div class="w-full h-full bg-gradient-to-br from-emerald-100 to-teal-100 flex items-center justify-center">
                <i data-lucide="newspaper" class="w-14 h-14 text-emerald-300"></i>
            </div>
        @endif

        @if ($article->category)
            <span class="absolute top-3 left-3 px-3 py-1 text-xs font-semibold text-white bg-emerald-500/90 rounded-full backdrop-blur">
                {{ $article->category->name }}
            </span>
        @endif
    </div>

    <div class="p-5 flex flex-col flex-1">
        <h3 class="font-bold text-lg text-slate-800 group-hover:text-emerald-600 transition-colors line-clamp-2">
            {{ $article->title }}
        </h3>
        <p class="mt-2 text-sm text-slate-500 line-clamp-3 flex-1">
            {{ Str::limit(strip_tags($article->content ?? ''), 120) }}
        </p>

        <div class="mt-4 flex items-center gap-4 text-sm text-slate-500">
            <span class="inline-flex items-center gap-1.5">
                <i data-lucide="calendar" class="w-4 h-4 text-emerald-500"></i>
                {{ $article->created_at->format('d M Y') }}
            </span>
            <span class="inline-flex items-center gap-1.5">
                <i data-lucide="user" class="w-4 h-4 text-emerald-500"></i>
                {{ $article->user?->name ?? 'DapurKita' }}
            </span>
        </div>
    </div>
</a>
