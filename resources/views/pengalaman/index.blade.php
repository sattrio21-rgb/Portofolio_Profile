<x-layouts.portfolio title="Pengalaman">

    <section class="pt-20 pb-12">
        <div class="max-w-6xl mx-auto px-6 sm:px-8">
            <div class="max-w-2xl">
                <a href="{{ route('home') }}" class="inline-flex items-center gap-2 text-sm text-gray-500 hover:text-white transition-colors mb-6">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                    Kembali
                </a>
                <h1 class="text-4xl sm:text-5xl font-bold text-white mb-4">Pengalaman Organisasi</h1>
                <p class="text-lg text-white/60">Pilih pengalaman organisasi yang ingin kamu lihat.</p>
            </div>
        </div>
    </section>

    <section class="pb-20">
        <div class="max-w-6xl mx-auto px-6 sm:px-8">
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-8 max-w-2xl mx-auto">

                <a href="{{ route('pengalaman.hima') }}"
                   class="group flex flex-col rounded-2xl bg-white/[0.03] border border-white/10 hover:border-emerald-500/40 transition-all duration-500 hover:shadow-2xl hover:shadow-emerald-500/10 overflow-hidden">
                    <div class="px-5 pt-5 pb-3" style="min-height: 70px;">
                        <h3 class="text-lg font-bold text-white leading-snug">{{ $profile->judul_hima ?? 'HIMA' }}</h3>
                        <p class="text-sm text-white/60 mt-1">{{ $profile->deskripsi_hima ?? 'Himpunan Mahasiswa Informatika' }}</p>
                    </div>
                    <div class="px-5 flex-1">
                        <div class="w-64 h-64 relative rounded-xl overflow-hidden bg-white/[0.05] border border-white/5">
                            @if($profile?->foto_hima)
                                <img src="{{ asset("storage/{$profile->foto_hima}") }}"
                                     alt="Pengalaman HIMA"
                                     class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
                            @else
                                <div class="w-full h-full bg-gradient-to-br from-emerald-500/20 to-emerald-500/5 flex items-center justify-center">
                                    <div class="text-center">
                                        <div class="w-20 h-20 mx-auto mb-3 rounded-full bg-emerald-500/10 flex items-center justify-center">
                                            <svg class="w-10 h-10 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                                            </svg>
                                        </div>
                                        <span class="text-sm text-white/60">Upload foto di admin</span>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="px-5 py-4">
                        <span class="inline-flex items-center gap-2 text-emerald-400 text-sm font-medium">
                            <span>Lihat Pengalaman</span>
                            <svg class="w-4 h-4 transition-transform duration-300 group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                        </span>
                    </div>
                </a>

                <a href="{{ route('pengalaman.bem') }}"
                   class="group flex flex-col rounded-2xl bg-white/[0.03] border border-white/10 hover:border-blue-500/40 transition-all duration-500 hover:shadow-2xl hover:shadow-blue-500/10 overflow-hidden">
                    <div class="px-5 pt-5 pb-3" style="min-height: 70px;">
                        <h3 class="text-lg font-bold text-white leading-snug">{{ $profile->judul_bem ?? 'BEM' }}</h3>
                        <p class="text-sm text-white/60 mt-1">{{ $profile->deskripsi_bem ?? 'Badan Eksekutif Mahasiswa' }}</p>
                    </div>
                    <div class="px-5 flex-1">
                        <div class="w-64 h-64 relative rounded-xl overflow-hidden bg-white/[0.05] border border-white/5">
                            @if($profile?->foto_bem)
                                <img src="{{ asset("storage/{$profile->foto_bem}") }}"
                                     alt="Pengalaman BEM"
                                     class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
                            @else
                                <div class="w-full h-full bg-gradient-to-br from-blue-500/20 to-blue-500/5 flex items-center justify-center">
                                    <div class="text-center">
                                        <div class="w-20 h-20 mx-auto mb-3 rounded-full bg-blue-500/10 flex items-center justify-center">
                                            <svg class="w-10 h-10 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                                            </svg>
                                        </div>
                                        <span class="text-sm text-white/60">Upload foto di admin</span>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="px-5 py-4">
                        <span class="inline-flex items-center gap-2 text-emerald-400 text-sm font-medium">
                            <span>Lihat Pengalaman</span>
                            <svg class="w-4 h-4 transition-transform duration-300 group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                        </span>
                    </div>
                </a>

            </div>
        </div>
    </section>

</x-layouts.portfolio>
