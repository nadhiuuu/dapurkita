@extends('layouts.user.app')
@section('title', 'Edit Resep')

@section('content')

<div class="mb-3 flex items-center justify-between">
    <div>
        <h1 class="text-2xl font-bold text-slate-800">Edit Resep</h1>
        <p class="text-sm text-slate-500">Perbarui data resep masakan</p>
    </div>
</div>
<x-edit-recipes />
@endsection