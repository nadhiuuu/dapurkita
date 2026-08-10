@props([
    'action',
    'method' => 'POST',
    'recipe' => null,
    'categories' => [],
    'showStatus' => false,
    'cancelRoute' => null,
    'import' => null,
])

@php
    $import = is_array($import) ? $import : null;
    $importImageUrl = old('image_url', $import['image_url'] ?? '');
    $previewSrc = $recipe?->image ? Storage::url($recipe->image) : $importImageUrl;
    $showPreview = (bool) ($recipe?->image || $importImageUrl);
@endphp

<div class="bg-white rounded-xl border border-slate-200 shadow-sm p-6">
    <form action="{{ $action }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf

        @if ($method !== 'POST')
            @method($method)
        @endif

        <div>
            <label class="block text-sm font-semibold text-slate-700 mb-1">Judul Resep</label>
            <input type="text" name="title" value="{{ old('title', $recipe?->title ?? $import['title'] ?? '') }}" placeholder="Contoh: Soto Ayam Santan"
                class="w-full px-4 py-2 bg-slate-50 border border-slate-200 rounded-lg text-sm text-slate-800 focus:bg-white focus:outline-none focus:border-orange-500 transition-all">

            @error('title')
                <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label class="block text-sm font-semibold text-slate-700 mb-1">Deskripsi</label>
            <textarea name="description" rows="3" placeholder="Deskripsi singkat resep (opsional)"
                class="w-full px-4 py-2 bg-slate-50 border border-slate-200 rounded-lg text-sm text-slate-800 focus:bg-white focus:outline-none focus:border-orange-500 transition-all">{{ old('description', $recipe?->description ?? $import['description'] ?? '') }}</textarea>

            @error('description')
                <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1">Kategori</label>
                <select name="recipe_category_id"
                    class="w-full px-4 py-2 bg-slate-50 border border-slate-200 rounded-lg text-sm text-slate-800 focus:bg-white focus:outline-none focus:border-orange-500 transition-all">
                    <option value="">-- Pilih Kategori --</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" @selected(old('recipe_category_id', $recipe?->recipe_category_id) == $category->id)>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>

                @error('recipe_category_id')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>

            @if ($showStatus)
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-1">Status</label>
                    <select name="status"
                        class="w-full px-4 py-2 bg-slate-50 border border-slate-200 rounded-lg text-sm text-slate-800 focus:bg-white focus:outline-none focus:border-orange-500 transition-all">
                        <option value="publish" @selected(old('status', $recipe?->status) === 'publish')>Publish</option>
                        <option value="draft" @selected(old('status', $recipe?->status) === 'draft')>Draft</option>
                    </select>

                    @error('status')
                        <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                    @enderror
                </div>
            @endif
        </div>

        <div>
            <label class="block text-sm font-semibold text-slate-700 mb-1">Gambar Resep</label>
            <input type="file" name="image" accept="image/*" onchange="previewRecipeImage(event)"
                class="w-full px-3 py-2 bg-slate-50 border border-slate-200 rounded-lg text-sm text-slate-600 focus:outline-none focus:border-orange-500 transition-all">
            <p class="text-xs text-slate-400 mt-1">*Pilih gambar baru jika ingin mengganti gambar lama.</p>

            @error('image')
                <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
            @enderror

            @if ($importImageUrl)
                <input type="hidden" name="image_url" value="{{ $importImageUrl }}">
                <p class="text-xs text-blue-600 mt-2 flex items-center gap-1.5">
                    <i data-lucide="link" class="w-3.5 h-3.5"></i>
                    Gambar otomatis diambil dari TheMealDB saat disimpan, atau unggah gambar sendiri.
                </p>
            @endif

            <div class="mt-2">
                <img id="recipe-img-preview"
                    src="{{ $previewSrc }}"
                    class="{{ $showPreview ? '' : 'hidden' }} w-32 h-32 object-cover rounded-lg border border-slate-200"
                    alt="Gambar Resep">
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1">Bahan-bahan</label>
                <textarea name="ingredients" rows="8"
                    placeholder="Contoh:&#10;- 500g daging ayam&#10;- 2 buah tomat&#10;- 1/2 paprika hijau"
                    class="w-full px-4 py-2 bg-slate-50 border border-slate-200 rounded-lg text-sm text-slate-800 focus:bg-white focus:outline-none focus:border-orange-500 transition-all">{{ old('ingredients', $recipe?->ingredients ?? $import['ingredients'] ?? '') }}</textarea>

                @error('ingredients')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1">Cara Membuat</label>
                <textarea name="steps" rows="8"
                    placeholder="Contoh:&#10;1. Potong ayam menjadi beberapa bagian.&#10;2. Tumis bumbu hingga harum."
                    class="w-full px-4 py-2 bg-slate-50 border border-slate-200 rounded-lg text-sm text-slate-800 focus:bg-white focus:outline-none focus:border-orange-500 transition-all">{{ old('steps', $recipe?->steps ?? $import['steps'] ?? '') }}</textarea>

                @error('steps')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="pt-4 flex justify-end gap-2 border-t border-slate-100">
            <a href="{{ $cancelRoute }}"
                class="px-4 py-2 bg-slate-100 hover:bg-slate-200 text-slate-700 font-medium text-sm rounded-lg transition-colors">
                Batal
            </a>

            <button type="submit"
                class="px-4 py-2 bg-orange-500 hover:bg-orange-600 text-white font-medium text-sm rounded-lg transition-colors">
                {{ $recipe ? 'Perbarui Resep' : 'Simpan Resep' }}
            </button>
        </div>
    </form>
</div>

<script>
    function previewRecipeImage(event) {
        const input = event.target;
        const preview = document.getElementById('recipe-img-preview');

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
