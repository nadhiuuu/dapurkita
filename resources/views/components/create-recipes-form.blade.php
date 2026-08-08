<div class="bg-white rounded-xl border border-slate-200 shadow-sm p-6">
    <form action="/admin/resep" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf
        <div>
            <label for="nama" class="block text-sm font-semibold text-slate-700 mb-1">Nama Resep</label>
            <input type="text" id="nama" name="nama" placeholder="Contoh: Soto Ayam Santan" required
                class="w-full px-4 py-2 bg-slate-50 border border-slate-200 rounded-lg text-sm text-slate-800 focus:bg-white focus:outline-none focus:border-orange-500 transition-all">
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div>
                <label for="kategori" class="block text-sm font-semibold text-slate-700 mb-1">Kategori</label>
                <select id="kategori" name="kategori" required
                    class="w-full px-4 py-2 bg-slate-50 border border-slate-200 rounded-lg text-sm text-slate-800 focus:bg-white focus:outline-none focus:border-orange-500 transition-all">
                    <option value="">-- Pilih Kategori --</option>
                    <option value="utama">Masakan Utama</option>
                    <option value="penutup">Makanan Penutup</option>
                    <option value="minuman">Minuman</option>
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
            <label class="block text-sm font-semibold text-slate-700 mb-1">Gambar Resep</label>
            <input type="file" id="gambar" name="gambar" accept="image/*" onchange="previewImage(event)" required
                class="w-full px-3 py-2 bg-slate-50 border border-slate-200 rounded-lg text-sm text-slate-600 focus:outline-none focus:border-orange-500 transition-all">
            <div class="mt-2">
                <img id="img-preview" class="hidden w-32 h-32 object-cover rounded-lg border border-slate-200"
                    alt="Preview Gambar">
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label for="bahan" class="block text-sm font-semibold text-slate-700 mb-1">Bahan-bahan</label>
                <textarea id="bahan" name="bahan" rows="8"
                    placeholder="Contoh:&#10;- 500g daging ayam&#10;- 2 buah tomat&#10;- 1/2 paprika hijau&#10;- 1 sachet Masako Rasa Ayam"
                    required
                    class="w-full px-4 py-2 bg-slate-50 border border-slate-200 rounded-lg text-sm text-slate-800 focus:bg-white focus:outline-none focus:border-orange-500 transition-all"></textarea>
            </div>

            <div>
                <label for="langkah" class="block text-sm font-semibold text-slate-700 mb-1">Cara Membuat</label>
                <textarea id="langkah" name="langkah" rows="8"
                    placeholder="Contoh:&#10;1. Potong ayam menjadi beberapa bagian.&#10;2. Tumis bumbu hingga harum.&#10;3. Masukkan tomat dan paprika, aduk rata."
                    required
                    class="w-full px-4 py-2 bg-slate-50 border border-slate-200 rounded-lg text-sm text-slate-800 focus:bg-white focus:outline-none focus:border-orange-500 transition-all"></textarea>
            </div>
        </div>

        <!-- Tombol Aksi -->
        <div class="pt-4 flex justify-end gap-2 border-t border-slate-100">
            <a href="/admin/resep"
                class="px-4 py-2 bg-slate-100 hover:bg-slate-200 text-slate-700 font-medium text-sm rounded-lg transition-colors">
                Batal
            </a>
            <button type="submit"
                class="px-4 py-2 bg-orange-500 hover:bg-orange-600 text-white font-medium text-sm rounded-lg transition-colors">
                Simpan Resep
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
            reader.onload = function (e) {
                preview.src = e.target.result;
                preview.classList.remove('hidden');
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>