@extends('layouts.admin.app')
@section('title', 'Tambah Akun')

@section('content')

<div class="mb-3 flex items-center justify-between">
    <div>
        <h1 class="text-2xl font-bold text-slate-800">Tambah Akun Baru</h1>
        <p class="text-sm text-slate-500">Buat pengguna baru untuk mengakses platform</p>
    </div>
</div>
<x-create-users-form />

@endsection