<form action="/login" method="POST" class="space-y-4">
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
        <input type="password" id="password" name="password" placeholder="••••••••" required
            class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm text-slate-800 focus:bg-white focus:outline-none focus:border-orange-500 focus:ring-1 focus:ring-orange-500 transition-all">
        <a href="#" class="mt-2 block text-right text-xs text-orange-600 hover:underline">Lupa Password?</a>
    </div>
    <button type="submit"
        class="w-full py-3 bg-orange-500 hover:bg-orange-600 text-white font-bold rounded-xl text-sm shadow-sm transition-colors mt-2">
        Masuk
    </button>
</form>
<div class="mt-6 text-center text-sm text-slate-500">
    Belum punya akun?
    <a href="/registrasi" class="font-bold text-orange-600 hover:underline">Daftar Sekarang</a>
</div>