@props(['recipes'])

<div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6">
    <h2 class="text-base font-bold text-slate-800 mb-4">Resep Terbaru</h2>
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="border-b border-slate-100 text-sm font-semibold text-slate-400">
                    <th class="py-3 px-4">Judul Resep</th>
                    <th class="py-3 px-4">Kategori</th>
                    <th class="py-3 px-4">Penulis</th>
                    <th class="py-3 px-4">Status</th>
                    <th class="py-3 px-4">Tanggal</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100 text-sm text-slate-700">
                @forelse ($recipes as $recipe)
                    <tr>
                        <td class="py-3 px-4 font-semibold">{{ $recipe->title }}</td>
                        <td class="py-3 px-4">
                            <span class="px-2.5 py-1 bg-orange-50 text-orange-600 font-bold rounded-lg text-xs">
                                {{ $recipe->category->name ?? '-' }}
                            </span>
                        </td>
                        <td class="py-3 px-4">{{ $recipe->user->name ?? '-' }}</td>
                        <td class="py-3 px-4">
                            @if ($recipe->status === 'publish')
                                <span class="px-2 py-1 bg-green-100 text-green-700 text-xs font-medium rounded-md">Publish</span>
                            @else
                                <span class="px-2 py-1 bg-slate-100 text-slate-600 text-xs font-medium rounded-md">Draft</span>
                            @endif
                        </td>
                        <td class="py-3 px-4 text-slate-500 text-xs">{{ $recipe->created_at->format('d M Y') }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="py-6 text-center text-slate-400">Belum ada resep.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
