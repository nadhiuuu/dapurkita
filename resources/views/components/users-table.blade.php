<div class="bg-white rounded-xl border border-slate-200 shadow-sm p-4 mb-4">
    <form action="" method="GET" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 gap-3">
        <div class="relative w-full">
            <i data-lucide="search" class="w-4 h-4 absolute left-3 top-1/2 -translate-y-1/2 text-slate-400"></i>
            <input type="text" name="search" placeholder="Cari nama atau email..."
                class="w-full pl-9 pr-4 py-2 bg-slate-50 border border-slate-200 rounded-lg text-sm focus:outline-none focus:border-orange-500 transition-colors">
        </div>
        <div class="w-full">
            <select name="role"
                class="w-full px-3 py-2 bg-slate-50 border border-slate-200 rounded-lg text-sm text-slate-600 focus:outline-none focus:border-orange-500 transition-colors">
                <option value="">Semua Role</option>
                <option value="admin">Admin</option>
                <option value="user">User/Pengguna</option>
            </select>
        </div>
    </form>
</div>

<div class="bg-white rounded-xl border border-slate-200 shadow-sm overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse whitespace-nowrap">
            <thead>
                <tr class="bg-slate-50 border-b border-slate-200 text-sm font-semibold text-slate-600">
                    <th class="py-3.5 px-6">Pengguna</th>
                    <th class="py-3.5 px-6">Role</th>
                    <th class="py-3.5 px-6">Tanggal Daftar</th>
                    <th class="py-3.5 px-6 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100 text-sm text-slate-700">
                
                <tr class="hover:bg-slate-50 transition-colors">
                    <td class="py-3.5 px-6">
                        <div class="flex items-center gap-3">
                            <img src="https://ui-avatars.com/api/?name=Admin+Dapur&bg=f97316&color=fff"
                                class="w-9 h-9 rounded-lg object-cover" alt="Avatar">
                            <div>
                                <p class="font-medium text-slate-800">Admin DapurKita</p>
                                <p class="text-xs text-slate-400">admin@dapurkita.com</p>
                            </div>
                        </div>
                    </td>
                    <td class="py-3.5 px-6">
                        <span class="px-2.5 py-1 bg-purple-100 text-purple-700 text-xs font-semibold rounded-md">Admin</span>
                    </td>
                    <td class="py-3.5 px-6 text-slate-500 text-xs">10 Jan 2026</td>
                    <td class="py-3.5 px-6">
                        <div class="flex items-center justify-center gap-2">
                            <a href="/admin/users/1/show" class="p-1.5 text-slate-500 hover:text-orange-500 rounded hover:bg-orange-50 transition-colors">
                                <i data-lucide="eye" class="w-4 h-4"></i>
                            </a>
                            <a href="/admin/users/1/edit" class="p-1.5 text-slate-500 hover:text-orange-500 rounded hover:bg-orange-50 transition-colors">
                                <i data-lucide="edit-3" class="w-4 h-4"></i>
                            </a>
                        </div>
                    </td>
                </tr>

                <tr class="hover:bg-slate-50 transition-colors">
                    <td class="py-3.5 px-6">
                        <div class="flex items-center gap-3">
                            <img src="https://ui-avatars.com/api/?name=Bunda+Maya&bg=0284c7&color=fff"
                                class="w-9 h-9 rounded-lg object-cover" alt="Avatar">
                            <div>
                                <p class="font-medium text-slate-800">Bunda Maya</p>
                                <p class="text-xs text-slate-400">maya@gmail.com</p>
                            </div>
                        </div>
                    </td>
                    <td class="py-3.5 px-6">
                        <span class="px-2.5 py-1 bg-blue-100 text-blue-700 text-xs font-semibold rounded-md">User</span>
                    </td>
                    <td class="py-3.5 px-6 text-slate-500 text-xs">02 Feb 2026</td>
                    <td class="py-3.5 px-6">
                        <div class="flex items-center justify-center gap-2">
                            <a href="/admin/users/2/show" class="p-1.5 text-slate-500 hover:text-orange-500 rounded hover:bg-orange-50 transition-colors">
                                <i data-lucide="eye" class="w-4 h-4"></i>
                            </a>
                            <a href="/admin/users/2/edit" class="p-1.5 text-slate-500 hover:text-orange-500 rounded hover:bg-orange-50 transition-colors">
                                <i data-lucide="edit-3" class="w-4 h-4"></i>
                            </a>
                            <button class="p-1.5 text-slate-500 hover:text-red-500 rounded hover:bg-red-50 transition-colors">
                                <i data-lucide="trash-2" class="w-4 h-4"></i>
                            </button>
                        </div>
                    </td>
                </tr>

            </tbody>
        </table>
    </div>

    <div class="p-4 border-t border-slate-200 flex flex-col sm:flex-row items-center justify-between gap-3 text-sm">
        <span class="text-slate-500 text-xs sm:text-sm">Menampilkan 1 - 2 dari 2 data</span>
        <div class="flex items-center gap-1">
            <button class="px-3 py-1.5 border border-slate-200 text-slate-500 rounded-md disabled:opacity-50" disabled>Sebelumnya</button>
            <button class="px-3 py-1.5 bg-orange-500 text-white rounded-md font-medium">1</button>
            <button class="px-3 py-1.5 border border-slate-200 text-slate-500 rounded-md disabled:opacity-50" disabled>Selanjutnya</button>
        </div>
    </div>
</div>