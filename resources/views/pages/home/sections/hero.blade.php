@use('Illuminate\Support\Facades\Storage')

<section class="relative text-white overflow-hidden min-h-screen flex items-center">
    <div class="absolute inset-0">
        @if ($hero->image)
            <img src="{{ Storage::url($hero->image) }}" class="w-full h-full object-cover" alt="{{ $hero->title }}" />
        @else
            <img src="{{ asset('images/Background.jpg') }}"
                class="w-full h-full object-cover" alt="background" />
        @endif
        <div class="absolute inset-0 bg-gradient-to-b md:bg-gradient-to-r from-amber-950/90 via-amber-900/90 to-transparent"></div>
    </div>
    <div class="relative w-full max-w-7xl mx-auto px-6 sm:px-8 lg:px-12 pt-32 pb-10 md:py-0">
        <div class="max-w-2xl">
            <h1 class="text-4xl sm:text-5xl md:text-6xl font-extrabold leading-tight mb-4">
                {{ $hero->title }} @if ($hero->highlight)<span class="text-orange-400">{{ $hero->highlight }}</span>@endif
            </h1>
            <p class="text-start text-lg md:text-xl text-orange-100 mb-8 leading-relaxed">
                {{ $hero->description }}
            </p>
            @if ($hero->button_text)
                <div class="flex flex-wrap items-center gap-4">
                    <a href="{{ $hero->button_url ?: route('home.recipes') }}"
                        class="inline-flex items-center gap-2 px-8 py-4 bg-orange-500 hover:bg-orange-600 text-white font-bold rounded-xl shadow-lg shadow-orange-900/30 transition-all">
                        <i data-lucide="search" class="w-5 h-5"></i>
                        {{ $hero->button_text }}
                    </a>
                </div>
            @endif
        </div>
    </div>
</section>
