<footer class="bg-slate-900 text-slate-300 mt-16 pt-12 pb-8 border-t border-slate-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mb-8">
            <div class="md:col-span-2">
                <a href="{{ route('home') }}" class="flex items-center gap-3 font-bold text-orange-500 mb-4">
                    <div class="w-10 h-10 bg-orange-500 text-white rounded-xl flex items-center justify-center shadow-sm">
                        <i data-lucide="cooking-pot" class="w-6 h-6"></i>
                    </div>
                    <span class="text-xl">DapurKita</span>
                </a>
                <p class="text-slate-400 text-sm max-w-sm leading-relaxed">
                    {{ $footer->description }}
                </p>
            </div>

            <div>
                <h4 class="text-white font-bold text-sm mb-4 tracking-wider">Kontak</h4>
                <ul class="space-y-3 text-sm text-slate-400">
                    @if ($footer->address)
                        <li class="flex items-start gap-3">
                            <i data-lucide="map-pin" class="w-4 h-4 mt-0.5 text-orange-500 shrink-0"></i>
                            <span>{{ $footer->address }}</span>
                        </li>
                    @endif
                    @if ($footer->email)
                        <li class="flex items-start gap-3">
                            <i data-lucide="mail" class="w-4 h-4 mt-0.5 text-orange-500 shrink-0"></i>
                            <a href="mailto:{{ $footer->email }}" class="hover:text-orange-500 transition-colors">{{ $footer->email }}</a>
                        </li>
                    @endif
                    @if ($footer->phone)
                        <li class="flex items-start gap-3">
                            <i data-lucide="phone" class="w-4 h-4 mt-0.5 text-orange-500 shrink-0"></i>
                            <a href="tel:{{ $footer->phone }}" class="hover:text-orange-500 transition-colors">{{ $footer->phone }}</a>
                        </li>
                    @endif
                </ul>
            </div>

            <div>
                <h4 class="text-white font-bold text-sm mb-4 tracking-wider">Ikuti Kami</h4>
                <div class="flex flex-wrap gap-3">
                    @if ($footer->facebook)
                        <a href="{{ $footer->facebook }}" target="_blank" rel="noopener noreferrer"
                            class="w-10 h-10 bg-slate-800 hover:bg-orange-500 text-slate-300 hover:text-white rounded-lg flex items-center justify-center transition-colors">
                            <x-icons.facebook class="w-5 h-5" />
                        </a>
                    @endif
                    @if ($footer->instagram)
                        <a href="{{ $footer->instagram }}" target="_blank" rel="noopener noreferrer"
                            class="w-10 h-10 bg-slate-800 hover:bg-orange-500 text-slate-300 hover:text-white rounded-lg flex items-center justify-center transition-colors">
                            <x-icons.instagram class="w-5 h-5" />
                        </a>
                    @endif
                    @if ($footer->twitter)
                        <a href="{{ $footer->twitter }}" target="_blank" rel="noopener noreferrer"
                            class="w-10 h-10 bg-slate-800 hover:bg-orange-500 text-slate-300 hover:text-white rounded-lg flex items-center justify-center transition-colors">
                            <x-icons.twitter class="w-5 h-5" />
                        </a>
                    @endif
                    @if ($footer->youtube)
                        <a href="{{ $footer->youtube }}" target="_blank" rel="noopener noreferrer"
                            class="w-10 h-10 bg-slate-800 hover:bg-orange-500 text-slate-300 hover:text-white rounded-lg flex items-center justify-center transition-colors">
                            <x-icons.youtube class="w-5 h-5" />
                        </a>
                    @endif
                </div>
            </div>
        </div>

        <div class="border-t border-slate-800 pt-6 flex flex-col sm:flex-row justify-between items-center text-xs text-slate-500 gap-4">
            <p>{{ $footer->copyright ?: '© ' . date('Y') . ' DapurKita. Semua Hak Cipta Dilindungi.' }}</p>
            <p>Dibuat dengan <span class="text-orange-500">&hearts;</span> untuk para pecinta masakan</p>
        </div>

    </div>
</footer>
