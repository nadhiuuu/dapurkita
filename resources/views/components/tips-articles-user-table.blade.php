@props([
    'tipsArticles',
    'categories' => [],
])

@use('Illuminate\Support\Facades\Storage')

<div class="bg-white rounded-xl border border-slate-200 shadow-sm p-4 mb-4">
    <form action="{{ route('user.tips-articles.index') }}" method="GET" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-3">
        <div>
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari judul artikel..."
                class="w-full px-3 py-2 bg-slate-50 border border-slate-200 rounded-lg text-sm focus:outline-none focus:border-orange-500 transition-colors">
        </div>

        <div>
            <select name="category"
                class="w-full px-3 py-2 bg-slate-50 border border-slate-200 rounded-lg text-sm text-slate-600 focus:outline-none focus:border-orange-500 transition-colors">
                <option value="">Semua Kategori</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" @selected(request('category') == $category->id)>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <select name="status"
                class="w-full px-3 py-2 bg-slate-50 border border-slate-200 rounded-lg text-sm text-slate-600 focus:outline-none focus:border-orange-500 transition-colors">
                <option value="">Semua Status</option>
                <option value="draft" @selected(request('status') === 'draft')>Draft</option>
                <option value="publish" @selected(request('status') === 'publish')>Publish</option>
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
                    <th class="py-3 px-4">Thumbnail</th>
                    <th class="py-3 px-4">Judul</th>
                    <th class="py-3 px-4">Kategori</th>
                    <th class="py-3 px-4">Status</th>
                    <th class="py-3 px-4">Tanggal</th>
                    <th class="py-3 px-4 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100 text-sm text-slate-700">
                @forelse ($tipsArticles as $tipsArticle)
                    <tr class="hover:bg-slate-50 transition-colors">
                        <td class="py-3 px-4">
                            @if ($tipsArticle->thumbnail)
                                <img src="{{ Storage::url($tipsArticle->thumbnail) }}" class="w-12 h-12 rounded-lg object-cover" alt="{{ $tipsArticle->title }}">
                            @else
                                <div class="w-12 h-12 rounded-lg bg-slate-100 flex items-center justify-center text-slate-400">
                                    <i data-lucide="image" class="w-5 h-5"></i>
                                </div>
                            @endif
                        </td>
                        <td class="py-3 px-4 font-medium text-slate-800">
                            <div class="truncate max-w-[220px]">{{ $tipsArticle->title }}</div>
                        </td>
                        <td class="py-3 px-4">{{ $tipsArticle->category->name ?? '-' }}</td>
                        <td class="py-3 px-4">
                            @if ($tipsArticle->status === 'publish')
                                <span class="px-2 py-1 bg-green-100 text-green-700 text-xs font-medium rounded-md">Publish</span>
                            @else
                                <span class="px-2 py-1 bg-slate-100 text-slate-600 text-xs font-medium rounded-md">Draft</span>
                            @endif
                        </td>
                        <td class="py-3 px-4 text-slate-500 text-xs">{{ $tipsArticle->created_at->format('d M Y') }}</td>
                        <td class="py-3 px-4">
                            <div class="flex items-center justify-center gap-2">
                                <a href="{{ route('user.tips-articles.edit', $tipsArticle) }}"
                                    class="p-1.5 text-slate-500 hover:text-orange-500 rounded hover:bg-orange-50 transition-colors">
                                    <i data-lucide="edit" class="w-4 h-4"></i>
                                </a>

                                <form action="{{ route('user.tips-articles.destroy', $tipsArticle) }}" method="POST"
                                    onsubmit="return confirm('Yakin ingin menghapus artikel ini?');">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                        class="p-1.5 text-slate-500 hover:text-red-500 rounded hover:bg-red-50 transition-colors">
                                        <i data-lucide="trash-2" class="w-4 h-4"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="py-6 text-center text-slate-400">Tidak ada artikel ditemukan.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <x-pagination :paginator="$tipsArticles" />
</div>
