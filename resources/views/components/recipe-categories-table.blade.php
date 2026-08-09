@props([
    'recipeCategories',
])

<div class="bg-white rounded-xl border border-slate-200 shadow-sm p-4 mb-4">
    <form action="{{ route('admin.recipe-categories.index') }}" method="GET" class="grid grid-cols-1 sm:grid-cols-2 gap-3">
        <div>
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari nama kategori..."
                class="w-full px-3 py-2 bg-slate-50 border border-slate-200 rounded-lg text-sm focus:outline-none focus:border-orange-500 transition-colors">
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
                    <th class="py-3 px-4 w-16">No</th>
                    <th class="py-3 px-4">Nama Kategori</th>
                    <th class="py-3 px-4">Slug</th>
                    <th class="py-3 px-4">Jumlah Resep</th>
                    <th class="py-3 px-4 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100 text-sm text-slate-700">
                @forelse ($recipeCategories as $category)
                    <tr class="hover:bg-slate-50 transition-colors">
                        <td class="py-3 px-4 text-slate-500">{{ $loop->iteration }}</td>
                        <td class="py-3 px-4 font-medium text-slate-800">{{ $category->name }}</td>
                        <td class="py-3 px-4 text-slate-500">{{ $category->slug }}</td>
                        <td class="py-3 px-4">
                            <span class="px-2 py-1 bg-slate-100 text-slate-700 text-xs font-medium rounded-md">{{ $category->recipes_count }} Resep</span>
                        </td>
                        <td class="py-3 px-4">
                            <div class="flex items-center justify-center gap-2">
                                <a href="{{ route('admin.recipe-categories.edit', $category) }}"
                                    class="p-1.5 text-slate-500 hover:text-orange-500 rounded hover:bg-orange-50 transition-colors">
                                    <i data-lucide="edit" class="w-4 h-4"></i>
                                </a>

                                <form action="{{ route('admin.recipe-categories.destroy', $category) }}" method="POST"
                                    onsubmit="return confirm('Yakin ingin menghapus kategori ini?');">
                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="p-1.5 text-slate-500 hover:text-red-500 rounded hover:bg-red-50 transition-colors">
                                        <i data-lucide="trash-2" class="w-4 h-4"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="py-6 text-center text-slate-400">Belum ada kategori.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <x-pagination :paginator="$recipeCategories" />
</div>
