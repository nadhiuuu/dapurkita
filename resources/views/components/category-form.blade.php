@props([
    'action',
    'method' => 'POST',
    'category' => null,
    'cancelRoute' => null,
    'nameLabel' => 'Nama Kategori',
    'namePlaceholder' => 'Contoh: Makanan Penutup',
])

<div class="bg-white rounded-xl border border-slate-200 shadow-sm p-6">
    <form action="{{ $action }}" method="POST" class="space-y-4">
        @csrf

        @if ($method !== 'POST')
            @method($method)
        @endif

        <div>
            <label class="block text-sm font-semibold text-slate-700 mb-1">{{ $nameLabel }}</label>
            <input type="text" name="name" value="{{ old('name', $category?->name) }}" placeholder="{{ $namePlaceholder }}" required
                class="w-full px-4 py-2 bg-slate-50 border border-slate-200 rounded-lg text-sm text-slate-800 focus:bg-white focus:outline-none focus:border-orange-500 transition-all">

            @error('name')
                <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="pt-4 flex justify-end gap-2 border-t border-slate-100">
            <a href="{{ $cancelRoute }}"
                class="px-4 py-2 bg-slate-100 hover:bg-slate-200 text-slate-700 font-medium text-sm rounded-lg transition-colors">
                Batal
            </a>

            <button type="submit"
                class="px-4 py-2 bg-orange-500 hover:bg-orange-600 text-white font-medium text-sm rounded-lg transition-colors">
                {{ $category ? 'Perbarui' : 'Simpan' }}
            </button>
        </div>
    </form>
</div>
