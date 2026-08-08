@extends('layouts.admin.app')
@section('title', 'Edit Akun')

@section('content')

<div class="mb-3 flex items-center justify-between">
    <div>
        <h1 class="text-2xl font-bold text-slate-800">Edit Akun</h1>
        <p class="text-sm text-slate-500">Perbarui informasi data pengguna</p>
    </div>
</div>

<x-edit-users-form />

@endsection