@extends('layouts.auth.app')
@section('title', 'Login')
@section('content')

<main class="min-h-screen pt-28 pb-16 bg-slate-50 flex items-center justify-center px-4">
    <div class="w-full max-w-md bg-white rounded-2xl border border-slate-200 shadow-sm p-6 sm:p-8">
        <div class="text-center mb-6">
            <a href="/"
                class="inline-flex items-center gap-2.5 font-bold text-orange-500 mb-3 hover:opacity-90 transition-opacity">
                <div class="w-10 h-10 bg-orange-500 text-white rounded-xl flex items-center justify-center shadow-sm">
                    <i data-lucide="cooking-pot" class="w-6 h-6"></i>
                </div>
                <span class="text-xl text-orange-500">DapurKita</span>
            </a>
            <h2 class="text-2xl font-bold text-slate-800">Buat Akun Baru</h2>
            <p class="text-sm text-slate-500 mt-1">Bergabung dengan komunitas DapurKita</p>
        </div>
        <x-registrasi-form />
    </div>
</main>

@endsection