@extends('layouts.user.app')
@section('title', 'Dashboard')

@section('content')

<div>
    <h1 class="text-2xl font-bold text-slate-800">Selamat datang, User</h1>
    <p class="text-base text-slate-500 mb-3">Kelola seluruh konten DapurKita dari sini.</p>
</div>
<x-dashboard-user-card />

<div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
    <x-latest-recipes-user-table />
    <x-latest-articles-user-table />
</div>
@endsection