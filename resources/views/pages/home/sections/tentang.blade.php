<section id="tentang" class="py-16 md:py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div>
                <span class="inline-block px-4 py-1.5 text-sm font-semibold text-orange-600 bg-orange-100 rounded-full mb-4">
                    Tentang Kami
                </span>
                <h2 class="text-3xl md:text-4xl font-bold text-slate-900 mb-4">
                    {{ $about->title }} @if ($about->highlight)<span class="text-orange-500">{{ $about->highlight }}</span>@endif
                </h2>
                <p class="text-slate-500 leading-relaxed mb-6">
                    {{ $about->description }}
                </p>
                <ul class="space-y-4">
                    @foreach ($about->advantages as $advantage)
                        <li class="flex items-start gap-3">
                            <span class="mt-0.5 w-8 h-8 bg-orange-100 text-orange-500 rounded-lg flex items-center justify-center shrink-0">
                                <i data-lucide="{{ $advantage->icon }}" class="w-4 h-4"></i>
                            </span>
                            <div>
                                <h4 class="font-bold text-slate-800">{{ $advantage->title }}</h4>
                                <p class="text-sm text-slate-500">{{ $advantage->description }}</p>
                            </div>
                        </li>
                    @endforeach
                </ul>
                @if ($about->button_text)
                    <a href="{{ $about->button_url ?: route('register') }}"
                        class="mt-8 inline-flex items-center gap-2 px-8 py-3.5 bg-orange-500 hover:bg-orange-600 text-white font-bold rounded-xl shadow-sm transition-all">
                        {{ $about->button_text }}
                        <i data-lucide="arrow-right" class="w-5 h-5"></i>
                    </a>
                @endif
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div class="bg-orange-50 rounded-2xl p-6 text-center border border-orange-100">
                    <i data-lucide="cooking-pot" class="w-8 h-8 text-orange-500 mx-auto mb-3"></i>
                    <div class="text-3xl font-bold text-slate-900">{{ $recipeCount ?? 0 }}+</div>
                    <p class="text-sm text-slate-500 mt-1">Resep Tersedia</p>
                </div>
                <div class="bg-emerald-50 rounded-2xl p-6 text-center border border-emerald-100">
                    <i data-lucide="newspaper" class="w-8 h-8 text-emerald-500 mx-auto mb-3"></i>
                    <div class="text-3xl font-bold text-slate-900">{{ $articleCount ?? 0 }}+</div>
                    <p class="text-sm text-slate-500 mt-1">Tips & Artikel</p>
                </div>
                <div class="bg-amber-50 rounded-2xl p-6 text-center border border-amber-100">
                    <i data-lucide="users" class="w-8 h-8 text-amber-500 mx-auto mb-3"></i>
                    <div class="text-3xl font-bold text-slate-900">{{ $userCount ?? 0 }}+</div>
                    <p class="text-sm text-slate-500 mt-1">Pengguna Aktif</p>
                </div>
                <div class="bg-sky-50 rounded-2xl p-6 text-center border border-sky-100">
                    <i data-lucide="heart" class="w-8 h-8 text-sky-500 mx-auto mb-3"></i>
                    <div class="text-3xl font-bold text-slate-900">100%</div>
                    <p class="text-sm text-slate-500 mt-1">Cinta & Dedikasi</p>
                </div>
            </div>
        </div>
    </div>
</section>
