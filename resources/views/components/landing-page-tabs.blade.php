@props(['active' => 'hero'])

@php
    $tabs = [
        'hero' => ['label' => 'Hero', 'route' => 'admin.landing-page.hero', 'icon' => 'image'],
        'about' => ['label' => 'Tentang', 'route' => 'admin.landing-page.about', 'icon' => 'info'],
        'footer' => ['label' => 'Footer', 'route' => 'admin.landing-page.footer', 'icon' => 'panel-bottom'],
    ];
@endphp

<div class="mb-5 border-b border-slate-200">
    <div class="flex flex-wrap gap-1">
        @foreach ($tabs as $key => $tab)
            <a href="{{ route($tab['route']) }}"
                class="inline-flex items-center gap-2 px-4 py-2.5 text-sm font-semibold rounded-t-lg border-b-2 transition-colors
                {{ $active === $key
                    ? 'text-orange-600 border-orange-500 bg-orange-50'
                    : 'text-slate-500 border-transparent hover:text-slate-800 hover:bg-slate-50' }}">
                <i data-lucide="{{ $tab['icon'] }}" class="w-4 h-4"></i>
                {{ $tab['label'] }}
            </a>
        @endforeach
    </div>
</div>
