@use('Illuminate\Support\Facades\Storage')

@extends('layouts.admin.app')
@section('title', 'Landing Page - Tentang')

@section('content')

<div class="mb-3 flex items-center justify-between">
    <div>
        <h1 class="text-2xl font-bold text-slate-800">Landing Page</h1>
        <p class="text-sm text-slate-500">Kelola konten landing page dari dashboard</p>
    </div>
</div>

<x-landing-page-tabs active="about" />

<x-alert-success />

<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
    <div class="lg:col-span-2 space-y-6">
        <div class="bg-white rounded-xl border border-slate-200 shadow-sm p-6">
            <h2 class="text-base font-bold text-slate-800 mb-4">Konten Section Tentang</h2>

            <form action="{{ route('admin.landing-page.about.update') }}" method="POST" class="space-y-4">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-1">Judul</label>
                        <input type="text" name="title" value="{{ old('title', $about->title) }}"
                            class="w-full px-4 py-2 bg-slate-50 border border-slate-200 rounded-lg text-sm text-slate-800 focus:bg-white focus:outline-none focus:border-orange-500 transition-all">
                        @error('title')
                            <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-1">Teks Sorotan</label>
                        <input type="text" name="highlight" value="{{ old('highlight', $about->highlight) }}"
                            placeholder="Ditampilkan dengan warna oranye"
                            class="w-full px-4 py-2 bg-slate-50 border border-slate-200 rounded-lg text-sm text-slate-800 focus:bg-white focus:outline-none focus:border-orange-500 transition-all">
                        @error('highlight')
                            <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-1">Deskripsi</label>
                    <textarea name="description" rows="4"
                        class="w-full px-4 py-2 bg-slate-50 border border-slate-200 rounded-lg text-sm text-slate-800 focus:bg-white focus:outline-none focus:border-orange-500 transition-all">{{ old('description', $about->description) }}</textarea>
                    @error('description')
                        <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-1">Teks Tombol</label>
                        <input type="text" name="button_text" value="{{ old('button_text', $about->button_text) }}"
                            placeholder="Contoh: Mulai Berbagi"
                            class="w-full px-4 py-2 bg-slate-50 border border-slate-200 rounded-lg text-sm text-slate-800 focus:bg-white focus:outline-none focus:border-orange-500 transition-all">
                        @error('button_text')
                            <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-1">Tautan Tombol</label>
                        <input type="text" name="button_url" value="{{ old('button_url', $about->button_url) }}"
                            placeholder="Contoh: /registrasi"
                            class="w-full px-4 py-2 bg-slate-50 border border-slate-200 rounded-lg text-sm text-slate-800 focus:bg-white focus:outline-none focus:border-orange-500 transition-all">
                        @error('button_url')
                            <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="pt-4 flex justify-end border-t border-slate-100">
                    <button type="submit"
                        class="px-6 py-2.5 bg-orange-500 hover:bg-orange-600 text-white font-medium text-sm rounded-lg transition-colors">
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>

        <div class="bg-white rounded-xl border border-slate-200 shadow-sm p-6">
            <h2 class="text-base font-bold text-slate-800 mb-4">Keunggulan</h2>

            @forelse ($about->advantages as $advantage)
                <div class="flex items-start gap-4 p-4 rounded-lg border border-slate-200 mb-3 bg-slate-50">
                    <div class="w-10 h-10 shrink-0 bg-orange-100 text-orange-500 rounded-lg flex items-center justify-center">
                        <i data-lucide="{{ $advantage->icon }}" class="w-5 h-5"></i>
                    </div>

                    <div class="flex-1">
                        <h4 class="font-bold text-slate-800 text-sm">{{ $advantage->title }}</h4>
                        <p class="text-sm text-slate-500">{{ $advantage->description }}</p>
                        <p class="text-xs text-slate-400 mt-1">Ikon: {{ $advantage->icon }}</p>
                    </div>

                    <div class="flex items-center gap-2 shrink-0">
                        <button type="button" data-advantage-edit="{{ $advantage->id }}"
                            data-icon="{{ $advantage->icon }}" data-title="{{ $advantage->title }}"
                            data-description="{{ $advantage->description }}"
                            class="edit-advantage-btn p-2 text-slate-600 hover:text-orange-500 hover:bg-orange-50 rounded-lg transition-colors">
                            <i data-lucide="pencil" class="w-4 h-4"></i>
                        </button>

                        <form action="{{ route('admin.landing-page.about.advantages.destroy', $advantage) }}"
                            method="POST" class="inline" onsubmit="return confirm('Hapus keunggulan ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="p-2 text-slate-600 hover:text-rose-500 hover:bg-rose-50 rounded-lg transition-colors">
                                <i data-lucide="trash-2" class="w-4 h-4"></i>
                            </button>
                        </form>
                    </div>
                </div>
            @empty
                <p class="text-sm text-slate-400">Belum ada keunggulan. Tambahkan melalui form di samping.</p>
            @endforelse
        </div>
    </div>

    <div class="space-y-6">
        <div class="bg-white rounded-xl border border-slate-200 shadow-sm p-6">
            <h2 class="text-base font-bold text-slate-800 mb-4">Tambah Keunggulan</h2>

            <form action="{{ route('admin.landing-page.about.advantages.store') }}" method="POST" class="space-y-4">
                @csrf

                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-1">Ikon <span
                            class="font-normal text-slate-400">(nama ikon lucide)</span></label>
                    <input type="text" name="icon" value="{{ old('icon') }}" placeholder="Contoh: users, book-open, chef-hat"
                        class="w-full px-4 py-2 bg-slate-50 border border-slate-200 rounded-lg text-sm text-slate-800 focus:bg-white focus:outline-none focus:border-orange-500 transition-all">
                    @error('icon')
                        <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-1">Judul</label>
                    <input type="text" name="title" value="{{ old('title') }}" placeholder="Contoh: Komunitas aktif"
                        class="w-full px-4 py-2 bg-slate-50 border border-slate-200 rounded-lg text-sm text-slate-800 focus:bg-white focus:outline-none focus:border-orange-500 transition-all">
                    @error('title')
                        <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-1">Deskripsi</label>
                    <textarea name="description" rows="3" placeholder="Deskripsi singkat keunggulan"
                        class="w-full px-4 py-2 bg-slate-50 border border-slate-200 rounded-lg text-sm text-slate-800 focus:bg-white focus:outline-none focus:border-orange-500 transition-all">{{ old('description') }}</textarea>
                    @error('description')
                        <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit"
                    class="w-full px-6 py-2.5 bg-orange-500 hover:bg-orange-600 text-white font-medium text-sm rounded-lg transition-colors">
                    <i data-lucide="plus" class="w-4 h-4 inline"></i>
                    Tambah Keunggulan
                </button>
            </form>
        </div>
    </div>
</div>

<div id="advantageModal"
    class="fixed inset-0 bg-slate-900/50 backdrop-blur-sm hidden items-center justify-center z-50 p-4 transition-all">

    <div class="bg-white rounded-2xl w-full max-w-md p-6 shadow-xl border border-slate-100 relative">
        <div class="flex justify-between items-center mb-5 border-b border-slate-100 pb-3">
            <h2 class="text-base font-bold text-slate-800">Edit Keunggulan</h2>
            <button id="closeAdvantageModal"
                class="p-1.5 text-slate-400 hover:text-slate-600 hover:bg-slate-100 rounded-lg transition-colors">
                <i data-lucide="x" class="w-5 h-5"></i>
            </button>
        </div>

        <form id="advantage-form" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1">Ikon</label>
                <input type="text" id="adv-icon-input" name="icon" placeholder="Contoh: users"
                    class="w-full px-4 py-2 bg-slate-50 border border-slate-200 rounded-lg text-sm text-slate-800 focus:bg-white focus:outline-none focus:border-orange-500 transition-all">
            </div>

            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1">Judul</label>
                <input type="text" id="adv-title-input" name="title"
                    class="w-full px-4 py-2 bg-slate-50 border border-slate-200 rounded-lg text-sm text-slate-800 focus:bg-white focus:outline-none focus:border-orange-500 transition-all">
            </div>

            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1">Deskripsi</label>
                <textarea id="adv-description-input" name="description" rows="3"
                    class="w-full px-4 py-2 bg-slate-50 border border-slate-200 rounded-lg text-sm text-slate-800 focus:bg-white focus:outline-none focus:border-orange-500 transition-all"></textarea>
            </div>

            <div class="pt-4 flex justify-end gap-2 border-t border-slate-100">
                <button type="button" id="closeAdvantageModal2"
                    class="px-4 py-2 bg-slate-100 hover:bg-slate-200 text-slate-700 font-medium text-sm rounded-lg transition-colors">
                    Batal
                </button>
                <button type="submit"
                    class="px-4 py-2 bg-orange-500 hover:bg-orange-600 text-white font-medium text-sm rounded-lg transition-colors">
                    Simpan
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    document.querySelectorAll('.edit-advantage-btn').forEach((btn) => {
        btn.addEventListener('click', function () {
            const id = this.dataset.advantageEdit;

            document.getElementById('adv-icon-input').value = this.dataset.icon;
            document.getElementById('adv-title-input').value = this.dataset.title;
            document.getElementById('adv-description-input').value = this.dataset.description;

            document.getElementById('advantage-form').action =
                `/admin/landing-page/about/advantages/${id}`;

            document.getElementById('advantageModal').classList.remove('hidden');
            document.getElementById('advantageModal').classList.add('flex');
        });
    });

    function closeAdvantageModal() {
        document.getElementById('advantageModal').classList.add('hidden');
        document.getElementById('advantageModal').classList.remove('flex');
    }

    document.getElementById('closeAdvantageModal').addEventListener('click', closeAdvantageModal);
    document.getElementById('closeAdvantageModal2').addEventListener('click', closeAdvantageModal);
</script>

@endsection
