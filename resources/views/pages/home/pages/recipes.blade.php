@extends('layouts.home.app')
@section('title', 'Resep Masakan')
@section('content')

<section class="pt-32 pb-16 bg-gradient-to-b from-orange-50 to-slate-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <x-section-title
            title="Semua Resep"
            subtitle="Jelajahi berbagai resep masakan dari komunitas DapurKita."
        />

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse ($recipes as $recipe)
                <x-recipe-card :recipe="$recipe" />
            @empty
                <div class="col-span-full text-center py-16 text-slate-400">
                    <i data-lucide="cooking-pot" class="w-12 h-12 mx-auto mb-4 text-slate-300"></i>
                    <p class="font-semibold">Belum ada resep untuk ditampilkan.</p>
                </div>
            @endforelse
        </div>

        <div class="mt-12">
            {{ $recipes->links() }}
        </div>
    </div>
</section>

@endsection
