@props(['title', 'subtitle' => null, 'accent' => false])

<div class="text-center mb-10">
    <h2 class="text-3xl md:text-4xl font-bold text-slate-900 {{ $accent ? 'inline-flex items-center gap-2' : '' }}">
        {{ $title }}
        @if ($accent)
            <span class="inline-block w-2.5 h-2.5 rounded-full bg-orange-500 animate-pulse"></span>
        @endif
    </h2>
    @if ($subtitle)
        <p class="mt-3 max-w-2xl mx-auto text-slate-500">{{ $subtitle }}</p>
    @endif
</div>
