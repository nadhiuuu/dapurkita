<!-- Modal Detail Pengguna -->
<div id="showModal" class="fixed inset-0 bg-slate-900/50 backdrop-blur-sm hidden items-center justify-center z-50 p-4 transition-all">

    <div class="bg-white rounded-2xl w-full max-w-md p-6 shadow-xl border border-slate-100 relative transform transition-all">
        
        <div class="flex justify-between items-center mb-5 border-b border-slate-100 pb-3">
            <h2 class="text-base font-bold text-slate-800">Detail Pengguna</h2>
            <button id="closeModal" class="p-1.5 text-slate-400 hover:text-slate-600 hover:bg-slate-100 rounded-lg transition-colors">
                <i data-lucide="x" class="w-5 h-5"></i>
            </button>
        </div>

        <div class="flex flex-col items-center text-center mb-6">
            <div class="relative">
                <img id="showPhoto" class="w-20 h-20 rounded-full object-cover ring-4 ring-orange-50 border border-slate-200 shadow-sm" alt="Foto Profil">
            </div>
            <h3 id="showName" class="mt-3 text-base font-bold text-slate-800"></h3>
            <p id="showEmail" class="text-xs text-slate-400"></p>
        </div>

        <div class="bg-slate-50 rounded-xl p-4 border border-slate-100 space-y-3">
            <div class="flex justify-between items-center">
                <span class="text-xs font-medium text-slate-500">Role Pengguna</span>
                <span id="showRole"></span>
            </div>
            <div class="border-t border-slate-200/60 my-2"></div>
            <div class="flex justify-between items-center">
                <span class="text-xs font-medium text-slate-500">Tanggal Terdaftar</span>
                <span id="showCreated" class="text-xs font-semibold text-slate-700"></span>
            </div>
        </div>
    </div>
</div>