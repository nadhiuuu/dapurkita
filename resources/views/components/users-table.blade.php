@props([
    'users',
])

<div class="bg-white rounded-xl border border-slate-200 shadow-sm p-4 mb-4">
    <form action="{{ route('admin.users.index') }}" method="GET" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-3">
        <div>
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari nama atau email..."
                class="w-full px-3 py-2 bg-slate-50 border border-slate-200 rounded-lg text-sm focus:outline-none focus:border-orange-500 transition-colors">
        </div>

        <div>
            <select name="role"
                class="w-full px-3 py-2 bg-slate-50 border border-slate-200 rounded-lg text-sm text-slate-600 focus:outline-none focus:border-orange-500 transition-colors">
                <option value="">Semua Role</option>
                <option value="admin" @selected(request('role') === 'admin')>Admin</option>
                <option value="user" @selected(request('role') === 'user')>User/Pengguna</option>
            </select>
        </div>

        <div>
            <button type="submit"
                class="w-full px-4 py-2 bg-orange-500 hover:bg-orange-600 text-white font-medium text-sm rounded-lg transition-colors">
                Filter
            </button>
        </div>
    </form>
</div>

<div class="bg-white rounded-xl border border-slate-200 shadow-sm overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse whitespace-nowrap">
            <thead>
                <tr class="bg-slate-50 border-b border-slate-200 text-sm font-semibold text-slate-600">
                    <th class="py-3 px-4">Pengguna</th>
                    <th class="py-3 px-4">Role</th>
                    <th class="py-3 px-4">Tanggal Daftar</th>
                    <th class="py-3 px-4 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100 text-sm text-slate-700">
                @forelse ($users as $user)
                    <tr class="hover:bg-slate-50 transition-colors">
                        <td class="py-3 px-4">
                            <div class="flex items-center gap-3">
                                <img src="{{ $user->photo
                                    ? asset('storage/' . $user->photo)
                                    : 'https://ui-avatars.com/api/?name=' . urlencode($user->name) . '&bg=f97316&color=fff' }}"
                                    class="w-9 h-9 rounded-lg object-cover" alt="{{ $user->name }}">
                                <div>
                                    <p class="font-medium text-slate-800">{{ $user->name }}</p>
                                    <p class="text-xs text-slate-400">{{ $user->email }}</p>
                                </div>
                            </div>
                        </td>
                        <td class="py-3 px-4">
                            @if ($user->role === 'admin')
                                <span class="px-2 py-1 bg-purple-100 text-purple-700 text-xs font-medium rounded-md">Admin</span>
                            @else
                                <span class="px-2 py-1 bg-blue-100 text-blue-700 text-xs font-medium rounded-md">User</span>
                            @endif
                        </td>
                        <td class="py-3 px-4 text-slate-500 text-xs">{{ $user->created_at->format('d M Y') }}</td>
                        <td class="py-3 px-4">
                            <div class="flex items-center justify-center gap-2">
                                <button
                                    type="button"
                                    class="btn-show p-1.5 text-slate-500 hover:text-orange-500 rounded hover:bg-orange-50 transition-colors"
                                    data-url="{{ route('admin.users.show', $user) }}">
                                    <i data-lucide="eye" class="w-4 h-4"></i>
                                </button>

                                <a href="{{ route('admin.users.edit', $user) }}"
                                    class="p-1.5 text-slate-500 hover:text-orange-500 rounded hover:bg-orange-50 transition-colors">
                                    <i data-lucide="edit" class="w-4 h-4"></i>
                                </a>

                                @if ($user->role !== 'admin')
                                    <form action="{{ route('admin.users.destroy', $user) }}" method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus akun ini?');">
                                        @csrf
                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="p-1.5 text-slate-500 hover:text-red-500 rounded hover:bg-red-50 transition-colors">
                                            <i data-lucide="trash-2" class="w-4 h-4"></i>
                                        </button>
                                    </form>
                                @endif
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="py-6 text-center text-slate-400">Belum ada data pengguna.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <x-pagination :paginator="$users->withQueryString()" />
</div>
