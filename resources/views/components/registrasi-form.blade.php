@if ($errors->any())
    <div class="mb-4 rounded-lg border border-red-200 bg-red-50 p-4">
        <ul class="list-disc list-inside text-sm text-red-600">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('register.process') }}" method="POST" class="space-y-4">
    @csrf
    <div>
        <label for="name" class="block text-xs font-bold text-slate-700 mb-2">Nama Lengkap</label>
        <input type="text" id="name" name="name" value="{{ old('name') }}" placeholder="Nama Lengkap Anda" required
            class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm text-slate-800 focus:bg-white focus:outline-none focus:border-orange-500 focus:ring-1 focus:ring-orange-500 transition-all">
    </div>
    <div>
        <label for="email" class="block text-xs font-bold text-slate-700 mb-2">Email</label>
        <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="nama@email.com" required
            class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm text-slate-800 focus:bg-white focus:outline-none focus:border-orange-500 focus:ring-1 focus:ring-orange-500 transition-all">
    </div>
    <div>
        <label for="password" class="block text-sm font-semibold text-slate-700 mb-1">Password</label>
        <div class="relative">
            <input type="password" id="password" name="password" placeholder="••••••••" required
                class="w-full pl-4 pr-10 py-2 bg-slate-50 border border-slate-200 rounded-lg text-sm text-slate-800 focus:bg-white focus:outline-none focus:border-orange-500 transition-all">

            <button type="button" onclick="togglePasswordVisibility('password', 'eye-icon-pass')"
                class="absolute right-3 top-1/2 -translate-y-1/2 text-slate-400 hover:text-slate-600 focus:outline-none">
                <i id="eye-icon-pass" data-lucide="eye" class="w-4 h-4"></i>
            </button>
        </div>
    </div>

    <div>
        <label for="password_confirmation" class="block text-sm font-semibold text-slate-700 mb-1">Konfirmasi
            Password</label>
        <div class="relative">
            <input type="password" id="password_confirmation" name="password_confirmation" placeholder="••••••••"
                required
                class="w-full pl-4 pr-10 py-2 bg-slate-50 border border-slate-200 rounded-lg text-sm text-slate-800 focus:bg-white focus:outline-none focus:border-orange-500 transition-all">

            <button type="button" onclick="togglePasswordVisibility('password_confirmation', 'eye-icon-confirm')"
                class="absolute right-3 top-1/2 -translate-y-1/2 text-slate-400 hover:text-slate-600 focus:outline-none">
                <i id="eye-icon-confirm" data-lucide="eye" class="w-4 h-4"></i>
            </button>
        </div>
    </div>
    <button type="submit"
        class="w-full py-3 bg-orange-500 hover:bg-orange-600 text-white font-bold rounded-xl text-sm shadow-sm transition-colors mt-2">
        Daftar Akun
    </button>
</form>

<div class="mt-6 text-center text-sm text-slate-500">
    Sudah punya akun?
    <a href="{{ route('login') }}" class="font-bold text-orange-600 hover:underline">Masuk</a>
</div>

<script>
    function togglePasswordVisibility(inputId, iconId) {
        const input = document.getElementById(inputId);
        const icon = document.getElementById(iconId);

        if (input.type === 'password') {
            input.type = 'text';
            icon.setAttribute('data-lucide', 'eye-off');
        } else {
            input.type = 'password';
            icon.setAttribute('data-lucide', 'eye');
        }

        lucide.createIcons();
    }
</script>