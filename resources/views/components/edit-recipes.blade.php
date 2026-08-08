<div class="bg-white rounded-xl border border-slate-200 shadow-sm p-6">
    <form action="/admin/resep/1" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label for="nama" class="block text-sm font-semibold text-slate-700 mb-1">Nama Resep</label>
            <input type="text" id="nama" name="nama" value="Soto Ayam Santan" required
                class="w-full px-4 py-2 bg-slate-50 border border-slate-200 rounded-lg text-sm text-slate-800 focus:bg-white focus:outline-none focus:border-orange-500 transition-all">
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div>
                <label for="kategori" class="block text-sm font-semibold text-slate-700 mb-1">Kategori</label>
                <select id="kategori" name="kategori" required
                    class="w-full px-4 py-2 bg-slate-50 border border-slate-200 rounded-lg text-sm text-slate-800 focus:bg-white focus:outline-none focus:border-orange-500 transition-all">
                    <option value="utama" selected>Masakan Utama</option>
                    <option value="penutup">Makanan Penutup</option>
                    <option value="minuman">Minuman</option>
                </select>
            </div>

            <div>
                <label for="status" class="block text-sm font-semibold text-slate-700 mb-1">Status Publish</label>
                <select id="status" name="status" required
                    class="w-full px-4 py-2 bg-slate-50 border border-slate-200 rounded-lg text-sm text-slate-800 focus:bg-white focus:outline-none focus:border-orange-500 transition-all">
                    <option value="publish" selected>Publish</option>
                    <option value="draft">Draft</option>
                </select>
            </div>
        </div>

        <div>
            <label class="block text-sm font-semibold text-slate-700 mb-1">Gambar Resep</label>
            <input type="file" id="gambar" name="gambar" accept="image/*" onchange="previewImage(event)"
                class="w-full px-3 py-2 bg-slate-50 border border-slate-200 rounded-lg text-sm text-slate-600 focus:outline-none focus:border-orange-500 transition-all">
            <p class="text-xs text-slate-400 mt-1">*Pilih gambar baru jika ingin mengganti gambar lama.</p>

            <div class="mt-2">
                <img id="img-preview"
                    src="https://images.unsplash.com/photo-1547592180-85f173990554?w=200&h=200&fit=crop"
                    class="w-32 h-32 object-cover rounded-lg border border-slate-200" alt="Gambar Resep">
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label for="bahan" class="block text-sm font-semibold text-slate-700 mb-1">Bahan-bahan</label>
                <textarea id="bahan" name="bahan" rows="8" required
                    class="w-full px-4 py-2 bg-slate-50 border border-slate-200 rounded-lg text-sm text-slate-800 focus:bg-white focus:outline-none focus:border-orange-500 transition-all">- 500g daging ayam
- 2 buah tomat, potong dadu
- 1/2 paprika hijau, potong panjang
- 1 sachet Masako Rasa Ayam
- 2 sdm minyak goreng
                </textarea>
            </div>

            <div>
                <label for="langkah" class="block text-sm font-semibold text-slate-700 mb-1">Cara Membuat</label>
                <textarea id="langkah" name="langkah" rows="8" required
                    class="w-full px-4 py-2 bg-slate-50 border border-slate-200 rounded-lg text-sm text-slate-800 focus:bg-white focus:outline-none focus:border-orange-500 transition-all">
1. Potong ayam menjadi beberapa bagian kecil.
2. Panaskan minyak, tumis paprika dan tomat hingga sedikit layu.
3. Masukkan ayam dan Masako, masak hingga matang dan bumbu meresap.
4. Angkat dan sajikan selagi hangat.
                </textarea>
            </div>
        </div>

        <div class="pt-4 flex justify-end gap-2 border-t border-slate-100">
            <a href="/admin/resep"
                class="px-4 py-2 bg-slate-100 hover:bg-slate-200 text-slate-700 font-medium text-sm rounded-lg transition-colors">
                Batal
            </a>
            <button type="submit"
                class="px-4 py-2 bg-orange-500 hover:bg-orange-600 text-white font-medium text-sm rounded-lg transition-colors">
                Perbarui Resep
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
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>