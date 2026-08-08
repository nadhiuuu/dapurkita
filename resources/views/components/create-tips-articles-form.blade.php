<div class="bg-white rounded-xl border border-slate-200 shadow-sm p-6">
    <form action="/admin/artikel" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf
        <div>
            <label for="judul" class="block text-sm font-semibold text-slate-700 mb-1">Judul Artikel</label>
            <input type="text" id="judul" name="judul" placeholder="Contoh: 5 Cara Mengawetkan Daging Tanpa Kulkas" required
                class="w-full px-4 py-2 bg-slate-50 border border-slate-200 rounded-lg text-sm text-slate-800 focus:bg-white focus:outline-none focus:border-orange-500 transition-all">
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div>
                <label for="kategori" class="block text-sm font-semibold text-slate-700 mb-1">Kategori</label>
                <select id="kategori" name="kategori" required
                    class="w-full px-4 py-2 bg-slate-50 border border-slate-200 rounded-lg text-sm text-slate-800 focus:bg-white focus:outline-none focus:border-orange-500 transition-all">
                    <option value="">-- Pilih Kategori --</option>
                    <option value="tips-dapur">Tips Dapur</option>
                    <option value="kesehatan">Kesehatan & Gizi</option>
                    <option value="info-bahan">Info Bahan</option>
                </select>
            </div>

            <div>
                <label for="status" class="block text-sm font-semibold text-slate-700 mb-1">Status Publish</label>
                <select id="status" name="status" required
                    class="w-full px-4 py-2 bg-slate-50 border border-slate-200 rounded-lg text-sm text-slate-800 focus:bg-white focus:outline-none focus:border-orange-500 transition-all">
                    <option value="publish">Publish</option>
                    <option value="draft">Draft</option>
                </select>
            </div>
        </div>

        <div>
            <label class="block text-sm font-semibold text-slate-700 mb-1">Thumbnail Artikel</label>
            <input type="file" id="thumbnail" name="thumbnail" accept="image/*" onchange="previewImage(event)" required
                class="w-full px-3 py-2 bg-slate-50 border border-slate-200 rounded-lg text-sm text-slate-600 focus:outline-none focus:border-orange-500 transition-all">
            <div class="mt-2">
                <img id="img-preview" class="hidden w-32 h-32 object-cover rounded-lg border border-slate-200" alt="Preview Thumbnail">
            </div>
        </div>

        <div>
            <label for="isi" class="block text-sm font-semibold text-slate-700 mb-1">Isi Artikel</label>
            <textarea id="isi" name="isi" rows="10" placeholder="Tuliskan konten artikel atau tips di sini..." required
                class="w-full px-4 py-2 bg-slate-50 border border-slate-200 rounded-lg text-sm text-slate-800 focus:bg-white focus:outline-none focus:border-orange-500 transition-all"></textarea>
        </div>

        <div class="pt-4 flex justify-end gap-2 border-t border-slate-100">
            <a href="/admin/tips-articles" class="px-4 py-2 bg-slate-100 hover:bg-slate-200 text-slate-700 font-medium text-sm rounded-lg transition-colors">
                Batal
            </a>
            <button type="submit" class="px-4 py-2 bg-orange-500 hover:bg-orange-600 text-white font-medium text-sm rounded-lg transition-colors">
                Simpan TIps & Artikel
            </button>
        </div>
    </form>
</div>

<script>
    function previewImage(event) {
        const input = event.target;
        const preview = document.getElementById('img-preview');
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.classList.remove('hidden');
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>