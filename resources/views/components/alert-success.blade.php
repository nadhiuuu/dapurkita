@if (session('success'))
    <div class="mb-4 px-4 py-3 bg-green-50 border border-green-200 text-green-700 text-sm rounded-lg">
        {{ session('success') }}
    </div>
@endif
