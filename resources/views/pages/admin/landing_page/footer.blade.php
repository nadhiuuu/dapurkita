@extends('layouts.admin.app')
@section('title', 'Landing Page - Footer')

@section('content')

<div class="mb-3 flex items-center justify-between">
    <div>
        <h1 class="text-2xl font-bold text-slate-800">Landing Page</h1>
        <p class="text-sm text-slate-500">Kelola konten landing page dari dashboard</p>
    </div>
</div>

<x-landing-page-tabs active="footer" />

<x-alert-success />

<div class="bg-white rounded-xl border border-slate-200 shadow-sm p-6 max-w-4xl">
    <form action="{{ route('admin.landing-page.footer.update') }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label class="block text-sm font-semibold text-slate-700 mb-1">Deskripsi</label>
            <textarea name="description" rows="3"
                class="w-full px-4 py-2 bg-slate-50 border border-slate-200 rounded-lg text-sm text-slate-800 focus:bg-white focus:outline-none focus:border-orange-500 transition-all">{{ old('description', $footer->description) }}</textarea>
            @error('description')
                <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1">Alamat</label>
                <input type="text" name="address" value="{{ old('address', $footer->address) }}"
                    class="w-full px-4 py-2 bg-slate-50 border border-slate-200 rounded-lg text-sm text-slate-800 focus:bg-white focus:outline-none focus:border-orange-500 transition-all">
                @error('address')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1">Email</label>
                <input type="email" name="email" value="{{ old('email', $footer->email) }}" placeholder="contoh@email.com"
                    class="w-full px-4 py-2 bg-slate-50 border border-slate-200 rounded-lg text-sm text-slate-800 focus:bg-white focus:outline-none focus:border-orange-500 transition-all">
                @error('email')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1">Nomor Telepon</label>
                <input type="text" name="phone" value="{{ old('phone', $footer->phone) }}" placeholder="Contoh: +62 812 3456 7890"
                    class="w-full px-4 py-2 bg-slate-50 border border-slate-200 rounded-lg text-sm text-slate-800 focus:bg-white focus:outline-none focus:border-orange-500 transition-all">
                @error('phone')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1">Copyright</label>
                <input type="text" name="copyright" value="{{ old('copyright', $footer->copyright) }}"
                    placeholder="Contoh: &copy; {{ date('Y') }} DapurKita. Semua Hak Cipta Dilindungi."
                    class="w-full px-4 py-2 bg-slate-50 border border-slate-200 rounded-lg text-sm text-slate-800 focus:bg-white focus:outline-none focus:border-orange-500 transition-all">
                @error('copyright')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div>
            <h3 class="text-sm font-bold text-slate-700 mb-3">Media Sosial</h3>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-1">Facebook</label>
                    <input type="url" name="facebook" value="{{ old('facebook', $footer->facebook) }}"
                        placeholder="https://facebook.com/..."
                        class="w-full px-4 py-2 bg-slate-50 border border-slate-200 rounded-lg text-sm text-slate-800 focus:bg-white focus:outline-none focus:border-orange-500 transition-all">
                    @error('facebook')
                        <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-1">Instagram</label>
                    <input type="url" name="instagram" value="{{ old('instagram', $footer->instagram) }}"
                        placeholder="https://instagram.com/..."
                        class="w-full px-4 py-2 bg-slate-50 border border-slate-200 rounded-lg text-sm text-slate-800 focus:bg-white focus:outline-none focus:border-orange-500 transition-all">
                    @error('instagram')
                        <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-1">Twitter / X</label>
                    <input type="url" name="twitter" value="{{ old('twitter', $footer->twitter) }}"
                        placeholder="https://twitter.com/..."
                        class="w-full px-4 py-2 bg-slate-50 border border-slate-200 rounded-lg text-sm text-slate-800 focus:bg-white focus:outline-none focus:border-orange-500 transition-all">
                    @error('twitter')
                        <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-1">YouTube</label>
                    <input type="url" name="youtube" value="{{ old('youtube', $footer->youtube) }}"
                        placeholder="https://youtube.com/..."
                        class="w-full px-4 py-2 bg-slate-50 border border-slate-200 rounded-lg text-sm text-slate-800 focus:bg-white focus:outline-none focus:border-orange-500 transition-all">
                    @error('youtube')
                        <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                    @enderror
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

@endsection
