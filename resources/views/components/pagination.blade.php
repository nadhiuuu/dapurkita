@props([
    'paginator',
])

@if ($paginator->hasPages())
    <div class="p-4 border-t border-slate-200 flex flex-col sm:flex-row items-center justify-between gap-3 text-sm">
        <span class="text-slate-500 text-xs sm:text-sm">
            Menampilkan {{ $paginator->firstItem() ?? 0 }} - {{ $paginator->lastItem() ?? 0 }} dari {{ $paginator->total() }} data
        </span>

        <div class="flex items-center gap-1">
            <a href="{{ $paginator->previousPageUrl() }}"
                class="px-3 py-1.5 border border-slate-200 text-slate-500 rounded-md hover:bg-slate-50 transition-colors {{ $paginator->onFirstPage() ? 'pointer-events-none opacity-50' : '' }}">
                Sebelumnya
            </a>

            @foreach ($paginator->getUrlRange(1, $paginator->lastPage()) as $page => $url)
                <a href="{{ $url }}"
                    class="px-3 py-1.5 border border-slate-200 rounded-md font-medium transition-colors {{ $page == $paginator->currentPage() ? 'bg-orange-500 text-white border-orange-500' : 'text-slate-500 hover:bg-slate-50' }}">
                    {{ $page }}
                </a>
            @endforeach

            <a href="{{ $paginator->nextPageUrl() }}"
                class="px-3 py-1.5 border border-slate-200 text-slate-500 rounded-md hover:bg-slate-50 transition-colors {{ $paginator->hasMorePages() ? '' : 'pointer-events-none opacity-50' }}">
                Selanjutnya
            </a>
        </div>
    </div>
@endif
