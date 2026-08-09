@if ($errors->any())
    <div class="mb-4 rounded-lg border border-red-200 bg-red-50 p-4">
        <ul class="list-disc list-inside text-sm text-red-600">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (session('success'))
    <div class="mb-4 rounded-lg border border-green-200 bg-green-50 p-4 text-sm text-green-600">
        {{ session('success') }}
    </div>
@endif

<form action="{{ route('login.process') }}" method="POST" class="space-y-4">
    @csrf
    <div>
        <label for="email" class="block text-xs font-bold text-slate-700 mb-2">Email</label>
        <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="nama@email.com" required
            class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm text-slate-800 focus:bg-white focus:outline-none focus:border-orange-500 focus:ring-1 focus:ring-orange-500 transition-all">
    </div>
    <div>
        <div class="flex justify-between items-center mb-2">
            <label for="password" class="block text-xs font-bold text-slate-700">Password</label>
        </div>
        <div class="relative">
            <input type="password" id="password" name="password" placeholder="••••••••" required
                class="w-full pl-4 pr-11 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm text-slate-800 focus:bg-white focus:outline-none focus:border-orange-500 focus:ring-1 focus:ring-orange-500 transition-all">

            <button type="button" onclick="togglePassword('password', 'eye-icon')"
                class="absolute right-3 top-1/2 -translate-y-1/2 text-slate-400 hover:text-slate-600 transition-colors focus:outline-none">
                <i id="eye-icon" data-lucide="eye" class="w-5 h-5"></i>
            </button>
        </div>
        <a href="#" class="mt-2 block text-right text-xs text-orange-600 hover:underline">Lupa Password?</a>
    </div>
    <button type="submit"
        class="w-full py-3 bg-orange-500 hover:bg-orange-600 text-white font-bold rounded-xl text-sm shadow-sm transition-colors mt-2">
        Masuk
    </button>
</form>
<div class="mt-6 text-center text-sm text-slate-500">
    Belum punya akun?
    <a href="{{ route('register') }}" class="font-bold text-orange-600 hover:underline">Daftar Sekarang</a>
</div>

<script>
function togglePassword(inputId, iconId) {
    const input = document.getElementById(inputId);
    const icon = document.getElementById(iconId);
    
    if (input.type === 'password') {
        input.type = 'text';
        icon.setAttribute('data-lucide', 'eye-off');
    } else {
        input.type = 'password';
        icon.setAttribute('data-lucide', 'eye');
    }
    if (typeof lucide !== 'undefined') {
        lucide.createIcons();
    }
}
</script>