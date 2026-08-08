<form action="/register" method="POST" class="space-y-4">
    @csrf
    <div>
        <label for="name" class="block text-xs font-bold text-slate-700 mb-1">Nama Lengkap</label>
        <input type="text" id="name" name="name" value="{{ old('name') }}" placeholder="Nama Lengkap Anda" required
            class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm text-slate-800 focus:bg-white focus:outline-none focus:border-orange-500 focus:ring-1 focus:ring-orange-500 transition-all">
    </div>
    <div>
        <label for="email" class="block text-xs font-bold text-slate-700 mb-1">Email</label>
        <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="nama@email.com" required
            class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm text-slate-800 focus:bg-white focus:outline-none focus:border-orange-500 focus:ring-1 focus:ring-orange-500 transition-all">
    </div>
    <div>
        <label for="password" class="block text-xs font-bold text-slate-700 mb-1">Password</label>
        <input type="password" id="password" name="password" placeholder="Minimal 8 karakter" required
            class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm text-slate-800 focus:bg-white focus:outline-none focus:border-orange-500 focus:ring-1 focus:ring-orange-500 transition-all">
    </div>
    <div>
        <label for="password_confirmation" class="block text-xs font-bold text-slate-700 mb-1">Konfirmasi
            Password</label>
        <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Ulangi password"
            required
            class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm text-slate-800 focus:bg-white focus:outline-none focus:border-orange-500 focus:ring-1 focus:ring-orange-500 transition-all">
    </div>
    <button type="submit"
        class="w-full py-3 bg-orange-500 hover:bg-orange-600 text-white font-bold rounded-xl text-sm shadow-sm transition-colors mt-2">
        Daftar Akun
    </button>
</form>
    
<div class="mt-6 text-center text-sm text-slate-500">
    Sudah punya akun?
    <a href="/login" class="font-bold text-orange-600 hover:underline">Masuk</a>
</div>