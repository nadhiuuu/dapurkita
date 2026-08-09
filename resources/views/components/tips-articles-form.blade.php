@props([
    'action',
    'method' => 'POST',
    'tipsArticle' => null,
    'categories' => [],
    'showStatus' => false,
    'cancelRoute' => null,
])

@use('Illuminate\Support\Facades\Storage')

<div class="bg-white rounded-xl border border-slate-200 shadow-sm p-6">
    <form action="{{ $action }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf

        @if ($method !== 'POST')
            @method($method)
        @endif

        <div>
            <label class="block text-sm font-semibold text-slate-700 mb-1">Thumbnail</label>
            <input type="file" name="thumbnail" accept="image/*" onchange="previewThumbnail(event)"
                class="w-full px-3 py-2 bg-slate-50 border border-slate-200 rounded-lg text-sm text-slate-600 focus:outline-none focus:border-orange-500 transition-all">
            <p class="text-xs text-slate-400 mt-1">*Pilih gambar baru jika ingin mengganti thumbnail lama.</p>

            @error('thumbnail')
                <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
            @enderror

            <div class="mt-2">
                <img id="thumbnail-preview"
                    src="{{ $tipsArticle?->thumbnail ? Storage::url($tipsArticle->thumbnail) : '' }}"
                    class="{{ $tipsArticle?->thumbnail ? '' : 'hidden' }} w-32 h-32 object-cover rounded-lg border border-slate-200"
                    alt="Preview Thumbnail">
            </div>
        </div>

        <div>
            <label class="block text-sm font-semibold text-slate-700 mb-1">Judul</label>
            <input type="text" name="title" value="{{ old('title', $tipsArticle?->title) }}" placeholder="Contoh: 5 Cara Mengawetkan Daging Tanpa Kulkas"
                class="w-full px-4 py-2 bg-slate-50 border border-slate-200 rounded-lg text-sm text-slate-800 focus:bg-white focus:outline-none focus:border-orange-500 transition-all">

            @error('title')
                <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1">Kategori</label>
                <select name="tips_article_category_id"
                    class="w-full px-4 py-2 bg-slate-50 border border-slate-200 rounded-lg text-sm text-slate-800 focus:bg-white focus:outline-none focus:border-orange-500 transition-all">
                    <option value="">-- Pilih Kategori --</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" @selected(old('tips_article_category_id', $tipsArticle?->tips_article_category_id) == $category->id)>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>

                @error('tips_article_category_id')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>

            @if ($showStatus)
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-1">Status</label>
                    <select name="status"
                        class="w-full px-4 py-2 bg-slate-50 border border-slate-200 rounded-lg text-sm text-slate-800 focus:bg-white focus:outline-none focus:border-orange-500 transition-all">
                        <option value="publish" @selected(old('status', $tipsArticle?->status) === 'publish')>Publish</option>
                        <option value="draft" @selected(old('status', $tipsArticle?->status) === 'draft')>Draft</option>
                    </select>

                    @error('status')
                        <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                    @enderror
                </div>
            @endif
        </div>

        <div>
            <label class="block text-sm font-semibold text-slate-700 mb-1">Isi Artikel</label>
            <textarea name="content" rows="10" placeholder="Tuliskan konten artikel atau tips di sini..."
                class="w-full px-4 py-2 bg-slate-50 border border-slate-200 rounded-lg text-sm text-slate-800 focus:bg-white focus:outline-none focus:border-orange-500 transition-all">{{ old('content', $tipsArticle?->content) }}</textarea>

            @error('content')
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
                {{ $tipsArticle ? 'Perbarui Artikel' : 'Simpan Artikel' }}
            </button>
        </div>
    </form>
</div>

<script>
    function previewThumbnail(event) {
        const input = event.target;
        const preview = document.getElementById('thumbnail-preview');

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
