<x-layouts.admin title="Dashboard">

    <div class="mb-8">
        <h1 class="text-2xl font-bold text-gray-900 mb-1">Dashboard</h1>
        <p class="text-gray-500">Selamat datang, {{ Auth::user()->name }}! 👋</p>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
        <div class="bg-white rounded-2xl border border-gray-100 p-5 hover:shadow-lg hover:shadow-gray-200/50 transition-all duration-300">
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 rounded-xl bg-blue-50 flex items-center justify-center">
                    <svg class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                </div>
                <div>
                    <p class="text-sm text-gray-500 mb-0.5">Status Profil</p>
                    <p class="text-lg font-bold text-gray-900">{{ $profile->nama ? 'Lengkap' : 'Belum Diisi' }}</p>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-2xl border border-gray-100 p-5 hover:shadow-lg hover:shadow-gray-200/50 transition-all duration-300">
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 rounded-xl bg-emerald-50 flex items-center justify-center">
                    <svg class="w-6 h-6 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                </div>
                <div>
                    <p class="text-sm text-gray-500 mb-0.5">Pengalaman</p>
                    <p class="text-lg font-bold text-gray-900">{{ $totalPengalaman }}</p>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-2xl border border-gray-100 p-5 hover:shadow-lg hover:shadow-gray-200/50 transition-all duration-300">
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 rounded-xl bg-purple-50 flex items-center justify-center">
                    <svg class="w-6 h-6 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/></svg>
                </div>
                <div>
                    <p class="text-sm text-gray-500 mb-0.5">Project</p>
                    <p class="text-lg font-bold text-gray-900">{{ $totalProject }}</p>
                </div>
            </div>
        </div>
    </div>

</x-layouts.admin>
