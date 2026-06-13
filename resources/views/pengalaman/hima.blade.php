<x-layouts.portfolio title="Pengalaman HIMA">

    {{-- Header --}}
    <section class="pt-20 pb-12">
        <div class="max-w-6xl mx-auto px-6 sm:px-8">
            <div class="max-w-2xl">
                <a href="{{ route('home') }}" class="inline-flex items-center gap-2 text-sm text-gray-500 hover:text-white transition-colors mb-6">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                    Kembali
                </a>
                <div class="flex items-center gap-4 mb-4">
                    <div class="w-16 h-16 rounded-2xl bg-emerald-500/10 flex items-center justify-center">
                        <svg class="w-8 h-8 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                        </svg>
                    </div>
                    <div>
                        <h1 class="text-4xl sm:text-5xl font-bold text-white">{{ $profile->judul_hima ?? 'HIMA' }}</h1>
                        <p class="text-lg text-gray-400">{{ $profile->deskripsi_hima ?? 'Himpunan Mahasiswa Informatika' }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Experience List --}}
    <section class="pb-20">
        <div class="max-w-6xl mx-auto px-6 sm:px-8">
            @if($pengalamans->count() > 0)
                <div class="space-y-4">
                    @foreach($pengalamans as $item)
                        <div class="group p-6 bg-white/[0.02] border border-white/5 rounded-2xl hover:bg-white/[0.04] hover:border-emerald-500/20 transition-all duration-300">
                            <div class="flex flex-col sm:flex-row sm:items-start gap-5">
                                {{-- Foto --}}
                                <div class="shrink-0">
                                    @if($item->foto)
                                        <img src="{{ asset('storage/' . $item->foto) }}" alt="{{ $item->nama_organisasi }}" class="w-16 h-16 rounded-2xl object-cover">
                                    @else
                                        <div class="w-16 h-16 rounded-2xl bg-emerald-500/10 flex items-center justify-center">
                                            <svg class="w-8 h-8 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                                        </div>
                                    @endif
                                </div>

                                {{-- Info --}}
                                <div class="flex-1">
                                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-1 mb-2">
                                        <h3 class="text-xl font-semibold text-white">{{ $item->nama_organisasi }}</h3>
                                        <span class="text-sm text-gray-500">
                                            {{ $item->tanggal_mulai->format('M Y') }}
                                            @if($item->tanggal_selesai)
                                                — {{ $item->tanggal_selesai->format('M Y') }}
                                            @else
                                                — Sekarang
                                            @endif
                                        </span>
                                    </div>
                                    <p class="text-emerald-400 font-medium mb-3">{{ $item->jabatan }}</p>
                                    @if($item->deskripsi)
                                        <p class="text-gray-400 leading-relaxed">{{ $item->deskripsi }}</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-20">
                    <div class="w-20 h-20 mx-auto mb-6 rounded-full bg-emerald-500/10 flex items-center justify-center">
                        <svg class="w-10 h-10 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                    </div>
                    <h3 class="text-xl font-semibold text-white mb-2">Belum Ada Pengalaman HIMA</h3>
                    <p class="text-gray-500">Pengalaman HIMA akan muncul di sini.</p>
                </div>
            @endif
        </div>
    </section>

</x-layouts.portfolio>
