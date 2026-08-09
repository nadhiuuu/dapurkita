@props([
    'action',
    'method' => 'POST',
    'user' => null,
    'cancelRoute' => null,
])

<div class="bg-white rounded-xl border border-slate-200 shadow-sm p-6">
    <form action="{{ $action }}" method="POST" class="space-y-4">
        @csrf

        @if ($method !== 'POST')
            @method($method)
        @endif

        <div>
            <label class="block text-sm font-semibold text-slate-700 mb-1">Nama Lengkap</label>
            <input type="text" name="name" value="{{ old('name', $user?->name) }}" placeholder="Masukkan nama lengkap" required
                class="w-full px-4 py-2 bg-slate-50 border border-slate-200 rounded-lg text-sm text-slate-800 focus:bg-white focus:outline-none focus:border-orange-500 transition-all">

            @error('name')
                <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label class="block text-sm font-semibold text-slate-700 mb-1">Email</label>
            <input type="email" name="email" value="{{ old('email', $user?->email) }}" placeholder="nama@email.com" required
                class="w-full px-4 py-2 bg-slate-50 border border-slate-200 rounded-lg text-sm text-slate-800 focus:bg-white focus:outline-none focus:border-orange-500 transition-all">

            @error('email')
                <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label class="block text-sm font-semibold text-slate-700 mb-1">Role / Akses</label>
            <select name="role" required
                class="w-full px-4 py-2 bg-slate-50 border border-slate-200 rounded-lg text-sm text-slate-800 focus:bg-white focus:outline-none focus:border-orange-500 transition-all">
                <option value="user" @selected(old('role', $user?->role) === 'user')>User</option>
                <option value="admin" @selected(old('role', $user?->role) === 'admin')>Admin</option>
            </select>

            @error('role')
                <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1">{{ $user ? 'Password Baru' : 'Password' }}</label>
                <div class="relative">
                    <input type="password" id="user-password" name="password" placeholder="••••••••" {{ $user ? '' : 'required' }}
                        class="w-full pr-10 py-2 bg-slate-50 border border-slate-200 rounded-lg text-sm text-slate-800 focus:bg-white focus:outline-none focus:border-orange-500 transition-all">

                    <button type="button" onclick="togglePasswordVisibility('user-password', 'user-eye-password')"
                        class="absolute right-3 top-1/2 -translate-y-1/2 text-slate-400 hover:text-slate-600 focus:outline-none">
                        <i id="user-eye-password" data-lucide="eye" class="w-4 h-4"></i>
                    </button>
                </div>

                @error('password')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1">{{ $user ? 'Konfirmasi Password Baru' : 'Konfirmasi Password' }}</label>
                <div class="relative">
                    <input type="password" id="user-password-confirmation" name="password_confirmation" placeholder="••••••••" {{ $user ? '' : 'required' }}
                        class="w-full pr-10 py-2 bg-slate-50 border border-slate-200 rounded-lg text-sm text-slate-800 focus:bg-white focus:outline-none focus:border-orange-500 transition-all">

                    <button type="button" onclick="togglePasswordVisibility('user-password-confirmation', 'user-eye-confirmation')"
                        class="absolute right-3 top-1/2 -translate-y-1/2 text-slate-400 hover:text-slate-600 focus:outline-none">
                        <i id="user-eye-confirmation" data-lucide="eye" class="w-4 h-4"></i>
                    </button>
                </div>
            </div>
        </div>

        <div class="pt-4 flex justify-end gap-2 border-t border-slate-100">
            <a href="{{ $cancelRoute }}"
                class="px-4 py-2 bg-slate-100 hover:bg-slate-200 text-slate-700 font-medium text-sm rounded-lg transition-colors">
                Batal
            </a>

            <button type="submit"
                class="px-4 py-2 bg-orange-500 hover:bg-orange-600 text-white font-medium text-sm rounded-lg transition-colors">
                {{ $user ? 'Perbarui Data' : 'Simpan' }}
            </button>
        </div>
    </form>
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
