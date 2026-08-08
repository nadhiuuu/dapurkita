<div class="bg-white rounded-xl border border-slate-200 shadow-sm p-4 mb-4">
    <form action="" method="GET" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-3">
        <div>
            <input type="text" name="search" placeholder="Cari nama resep..."
                class="w-full px-3 py-2 bg-slate-50 border border-slate-200 rounded-lg text-sm focus:outline-none focus:border-orange-500 transition-colors">
        </div>
        <div>
            <select name="kategori"
                class="w-full px-3 py-2 bg-slate-50 border border-slate-200 rounded-lg text-sm text-slate-600 focus:outline-none focus:border-orange-500 transition-colors">
                <option value="">Semua Kategori</option>
                <option value="utama">Masakan Utama</option>
                <option value="penutup">Makanan Penutup</option>
                <option value="minuman">Minuman</option>
            </select>
        </div>

        <div>
            <input type="date" name="tanggal"
                class="w-full px-3 py-2 bg-slate-50 border border-slate-200 rounded-lg text-sm text-slate-600 focus:outline-none focus:border-orange-500 transition-colors">
        </div>

    </form>
</div>

<div class="bg-white rounded-xl border border-slate-200 shadow-sm overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse whitespace-nowrap">
            <thead>
                <tr class="bg-slate-50 border-b border-slate-200 text-sm font-semibold text-slate-600">
                    <th class="py-3 px-4">Gambar</th>
                    <th class="py-3 px-4">Nama</th>
                    <th class="py-3 px-4">Resep</th>
                    <th class="py-3 px-4">Kategori</th>
                    <th class="py-3 px-4">Status</th>
                    <th class="py-3 px-4">Tanggal</th>
                    <th class="py-3 px-4 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100 text-sm text-slate-700">

                <tr class="hover:bg-slate-50 transition-colors">
                    <td class="py-3 px-4">
                        <img src="https://images.unsplash.com/photo-1547592180-85f173990554?w=100&h=100&fit=crop"
                            class="w-12 h-12 rounded-lg object-cover" alt="Soto Ayam">
                    </td>
                    <td class="py-3 px-4 font-medium text-slate-800">Soto Ayam Santan</td>
                    <td class="py-3 px-4 text-slate-500">
                        <div class="truncate max-w-[150px]">Rebus ayam dengan bumbu halus kuning dan sereh...</div>
                    </td>
                    <td class="py-3 px-4">Masakan Utama</td>
                    <td class="py-3 px-4">Bunda Maya</td>
                    <td class="py-3 px-4">
                        <span
                            class="px-2 py-1 bg-green-100 text-green-700 text-xs font-medium rounded-md">Publish</span>
                    </td>
                    <td class="py-3 px-4 text-slate-500 text-xs">08 Agt 2026</td>
                    <td class="py-3 px-4">
                        <div class="flex items-center justify-center gap-2">
                            <a href="/admin/resep/1/show"
                                class="p-1.5 text-slate-500 hover:text-orange-500 rounded hover:bg-orange-50 transition-colors">
                                <i data-lucide="eye" class="w-4 h-4"></i>
                            </a>
                            <a href="/admin/resep/1/edit"
                                class="p-1.5 text-slate-500 hover:text-orange-500 rounded hover:bg-orange-50 transition-colors">
                                <i data-lucide="edit" class="w-4 h-4"></i>
                            </a>
                            <button
                                class="p-1.5 text-slate-500 hover:text-red-500 rounded hover:bg-red-50 transition-colors">
                                <i data-lucide="trash-2" class="w-4 h-4"></i>
                            </button>
                        </div>
                    </td>
                </tr>

                <tr class="hover:bg-slate-50 transition-colors">
                    <td class="py-3 px-4">
                        <div class="w-12 h-12 rounded-lg bg-slate-100 flex items-center justify-center text-slate-400">
                            <i data-lucide="image" class="w-5 h-5"></i>
                        </div>
                    </td>
                    <td class="py-3 px-4 font-medium text-slate-800">Es Cendol Durian</td>
                    <td class="py-3 px-4 text-slate-500">
                        <div class="truncate max-w-[150px]">Campurkan santan, gula merah cair, lalu masukkan...</div>
                    </td>
                    <td class="py-3 px-4">Minuman</td>
                    <td class="py-3 px-4">Admin Dapur</td>
                    <td class="py-3 px-4">
                        <span class="px-2 py-1 bg-slate-100 text-slate-600 text-xs font-medium rounded-md">Draft</span>
                    </td>
                    <td class="py-3 px-4 text-slate-500 text-xs">05 Agt 2026</td>
                    <td class="py-3 px-4">
                        <div class="flex items-center justify-center gap-2">
                            <a href="/admin/resep/3/show"
                                class="p-1.5 text-slate-500 hover:text-orange-500 rounded hover:bg-orange-50 transition-colors">
                                <i data-lucide="eye" class="w-4 h-4"></i>
                            </a>
                            <a href="/admin/resep/2/edit"
                                class="p-1.5 text-slate-500 hover:text-orange-500 rounded hover:bg-orange-50 transition-colors">
                                <i data-lucide="edit" class="w-4 h-4"></i>
                            </a>
                            <button
                                class="p-1.5 text-slate-500 hover:text-red-500 rounded hover:bg-red-50 transition-colors">
                                <i data-lucide="trash-2" class="w-4 h-4"></i>
                            </button>
                        </div>
                    </td>
                </tr>

            </tbody>
        </table>
    </div>

    <div class="p-4 border-t border-slate-200 flex flex-col sm:flex-row items-center justify-between gap-3 text-sm">
        <span class="text-slate-500 text-xs sm:text-sm">Menampilkan 1 - 10 dari 86 data</span>

        <div class="flex items-center gap-1">
            <button
                class="px-3 py-1.5 border border-slate-200 text-slate-500 rounded-md hover:bg-slate-50 disabled:opacity-50"
                disabled>Sebelumnnya</button>
            <button class="px-3 py-1.5 bg-orange-500 text-white rounded-md font-medium">1</button>
            <button class="px-3 py-1.5 border border-slate-200 text-slate-500 rounded-md hover:bg-slate-50">2</button>
            <button class="px-3 py-1.5 border border-slate-200 text-slate-500 rounded-md hover:bg-slate-50">3</button>
            <button
                class="px-3 py-1.5 border border-slate-200 text-slate-500 rounded-md hover:bg-slate-50">Selanjutnya</button>
        </div>
    </div>
</div>