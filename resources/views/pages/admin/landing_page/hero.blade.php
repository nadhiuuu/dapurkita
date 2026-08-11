@extends('layouts.admin.app')
@section('title', 'Landing Page - Hero')

@section('content')

<div class="mb-3 flex items-center justify-between">
    <div>
        <h1 class="text-2xl font-bold text-slate-800">Landing Page</h1>
        <p class="text-sm text-slate-500">Kelola konten landing page dari dashboard</p>
    </div>
</div>

<x-landing-page-tabs active="hero" />

<x-alert-success />

<div class="bg-white rounded-xl border border-slate-200 shadow-sm p-6">
    <form action="{{ route('admin.landing-page.hero.update') }}" method="POST" enctype="multipart/form-data"
        class="space-y-4">

        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-1">Judul</label>
                    <input type="text" name="title" value="{{ old('title', $hero->title) }}"
                        class="w-full px-4 py-2 bg-slate-50 border border-slate-200 rounded-lg text-sm text-slate-800 focus:bg-white focus:outline-none focus:border-orange-500 transition-all">
                    @error('title')
                        <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-1">Teks Sorotan</label>
                    <input type="text" name="highlight" value="{{ old('highlight', $hero->highlight) }}"
                        placeholder="Ditampilkan dengan warna oranye, contoh: bagikan kreasi"
                        class="w-full px-4 py-2 bg-slate-50 border border-slate-200 rounded-lg text-sm text-slate-800 focus:bg-white focus:outline-none focus:border-orange-500 transition-all">
                    @error('highlight')
                        <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-1">Deskripsi</label>
                    <textarea name="description" rows="4" placeholder="Deskripsi singkat hero section"
                        class="w-full px-4 py-2 bg-slate-50 border border-slate-200 rounded-lg text-sm text-slate-800 focus:bg-white focus:outline-none focus:border-orange-500 transition-all">{{ old('description', $hero->description) }}</textarea>
                    @error('description')
                        <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-1">Teks Tombol</label>
                        <input type="text" name="button_text" value="{{ old('button_text', $hero->button_text) }}"
                            placeholder="Contoh: Cari Resep"
                            class="w-full px-4 py-2 bg-slate-50 border border-slate-200 rounded-lg text-sm text-slate-800 focus:bg-white focus:outline-none focus:border-orange-500 transition-all">
                        @error('button_text')
                            <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-1">Tautan Tombol</label>
                        <input type="text" name="button_url" value="{{ old('button_url', $hero->button_url) }}"
                            placeholder="Contoh: /resep"
                            class="w-full px-4 py-2 bg-slate-50 border border-slate-200 rounded-lg text-sm text-slate-800 focus:bg-white focus:outline-none focus:border-orange-500 transition-all">
                        @error('button_url')
                            <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1">Gambar Hero</label>
                <input type="file" name="image" accept="image/*" onchange="previewImage(event)"
                    class="w-full px-3 py-2 bg-slate-50 border border-slate-200 rounded-lg text-sm text-slate-600 focus:outline-none focus:border-orange-500 transition-all">
                <p class="text-xs text-slate-400 mt-1">*Pilih gambar baru jika ingin mengganti gambar lama.</p>

                @error('image')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror

                <div class="mt-3">
                    <img id="image-preview"
                        src="{{ $hero->image ? Storage::url($hero->image) : '' }}"
                        class="{{ $hero->image ? '' : 'hidden' }} w-full h-64 object-cover rounded-lg border border-slate-200"
                        alt="Preview Gambar Hero">
                </div>
            </div>
        </div>

        <div class="pt-4 flex justify-end gap-2 border-t border-slate-100">
            <button type="submit"
                class="px-6 py-2.5 bg-orange-500 hover:bg-orange-600 text-white font-medium text-sm rounded-lg transition-colors">
                Simpan Perubahan
            </button>
        </div>
    </form>
</div>

<script>
    function previewImage(event) {
        const input = event.target;
        const preview = document.getElementById('image-preview');

        if (input.files && input.files[0]) {
            const reader = new FileReader();

            reader.onload = function (e) {
                preview.src = e.target.result;
                preview.classList.remove('hidden');
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>

@endsection
