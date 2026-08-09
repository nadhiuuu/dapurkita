@extends('layouts.admin.app')
@section('title', 'Manajemen Akun')

@section('content')

<div class="mb-3 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
    <div>
        <h1 class="text-2xl font-bold text-slate-800">Manajemen Akun</h1>
        <p class="text-sm text-slate-500">Kelola data pengguna, peran, dan akses sistem</p>
    </div>
    <a href="{{ route('admin.users.create') }}"
        class="inline-flex items-center justify-center gap-2 px-4 py-2 bg-orange-500 hover:bg-orange-600 text-white font-medium text-sm rounded-lg transition-colors">
        <i data-lucide="plus" class="w-4 h-4"></i>
        Tambah Akun
    </a>
</div>

<x-alert-success />

<x-users-table :users="$users" />
<x-show-users-modal />

<script>
const modal = document.getElementById('showModal');

document.querySelectorAll('.btn-show').forEach(button => {

    button.addEventListener('click', async () => {

        const response = await fetch(button.dataset.url);

        const user = await response.json();

        document.getElementById('showName').textContent = user.name;
        document.getElementById('showEmail').textContent = user.email;
        document.getElementById('showRole').textContent = user.role;
        document.getElementById('showCreated').textContent = user.created_at;

        document.getElementById('showPhoto').src =
            user.photo ??
            'https://ui-avatars.com/api/?name=' + encodeURIComponent(user.name);

        modal.classList.remove('hidden');
        modal.classList.add('flex');
    });

});

document.getElementById('closeModal').onclick = () => {

    modal.classList.remove('flex');
    modal.classList.add('hidden');

};

modal.onclick = e => {

    if (e.target === modal) {
        modal.classList.remove('flex');
        modal.classList.add('hidden');
    }

};
</script>
@endsection
