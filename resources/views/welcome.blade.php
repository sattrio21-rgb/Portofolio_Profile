<x-layouts.portfolio title="Beranda">

    {{-- Header Navigation --}}
    <header class="sticky top-0 z-50 bg-[#0a0a0a]/90 backdrop-blur-md border-b border-white/5">
        <div class="max-w-6xl mx-auto px-6 sm:px-8">
            <nav class="flex items-center justify-end h-14" style="gap: 2rem;">
                <a href="#profil"
                   class="text-sm font-medium transition-colors duration-200 text-gray-500 hover:text-white">
                    Profil
                </a>
                <a href="#pendidikan"
                   class="text-sm font-medium transition-colors duration-200 text-gray-500 hover:text-white">
                    Pendidikan
                </a>
                <a href="#pengalaman"
                   class="text-sm font-medium transition-colors duration-200 text-gray-500 hover:text-white">
                    Pengalaman
                </a>
                <a href="#project"
                   class="text-sm font-medium transition-colors duration-200 text-gray-500 hover:text-white">
                    Project
                </a>
            </nav>
        </div>
    </header>

    {{-- Hero Section --}}
    <section id="profil" class="min-h-[85vh] flex items-center">
        <div class="max-w-6xl mx-auto px-6 sm:px-8 w-full">
            <div class="flex flex-col lg:flex-row items-center gap-12 lg:gap-20">

                {{-- Text Content --}}
                <div class="flex-1 text-center lg:text-left">

                    <h1 class="text-4xl sm:text-5xl lg:text-6xl font-bold leading-tight mb-6">
                        <span class="text-gray-400">Halo, saya</span><br>
                        <span class="text-white">{{ $profile->nama ?? 'Nama Kamu' }}</span>
                    </h1>

                    <p class="text-lg text-gray-400 max-w-lg mb-8 leading-relaxed">
                        {{ $profile->deskripsi ?? 'Deskripsi tentang dirimu akan muncul di sini.' }}
                    </p>

                    {{-- Social Links --}}
                    <div class="flex flex-wrap justify-center lg:justify-start gap-3">
                        @if($profile->email)
                            <a href="mailto:{{ $profile->email }}"
                               class="inline-flex items-center gap-2 px-4 py-2.5 bg-white/5 border border-white/10 rounded-lg text-sm text-gray-300 hover:bg-white/10 hover:border-white/20 transition-all duration-200">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                                Email
                            </a>
                        @endif
                        @if($profile->instagram)
                            <a href="{{ $profile->instagram }}" target="_blank"
                               class="inline-flex items-center gap-2 px-4 py-2.5 bg-white/5 border border-white/10 rounded-lg text-sm text-gray-300 hover:bg-white/10 hover:border-white/20 transition-all duration-200">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                                Instagram
                            </a>
                        @endif
                        @if($profile->linkedin)
                            <a href="{{ $profile->linkedin }}" target="_blank"
                               class="inline-flex items-center gap-2 px-4 py-2.5 bg-white/5 border border-white/10 rounded-lg text-sm text-gray-300 hover:bg-white/10 hover:border-white/20 transition-all duration-200">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg>
                                LinkedIn
                            </a>
                        @endif
                        @if($profile->github)
                            <a href="{{ $profile->github }}" target="_blank"
                               class="inline-flex items-center gap-2 px-4 py-2.5 bg-white/5 border border-white/10 rounded-lg text-sm text-gray-300 hover:bg-white/10 hover:border-white/20 transition-all duration-200">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/></svg>
                                GitHub
                            </a>
                        @endif
                    </div>
                </div>

                {{-- Profile Photo --}}
                <div class="shrink-0">
                    @if($profile->foto)
                        <div class="relative">
                            <div class="absolute -inset-1 bg-gradient-to-r from-emerald-500 to-blue-500 rounded-2xl blur opacity-30"></div>
                            <img src="{{ asset('storage/' . $profile->foto) }}"
                                 alt="{{ $profile->nama }}"
                                 class="relative w-64 h-64 rounded-2xl object-cover border-4 border-[#0a0a0a]">
                        </div>
                    @else
                        <div class="relative">
                            <div class="absolute -inset-1 bg-gradient-to-r from-emerald-500 to-blue-500 rounded-2xl blur opacity-30"></div>
                            <div class="relative w-64 h-64 rounded-2xl bg-gradient-to-br from-gray-800 to-gray-900 flex items-center justify-center border-4 border-[#0a0a0a]">
                                <svg class="w-24 h-24 text-gray-600" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                                </svg>
                            </div>
                        </div>
                    @endif
                </div>

            </div>
        </div>
    </section>

    {{-- Latar Belakang Pendidikan Section --}}
    @if($pendidikans->count() > 0)
    <section id="pendidikan" class="py-20">
        <div class="max-w-6xl mx-auto px-6 sm:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-white mb-3">Latar Belakang <span class="text-emerald-400">Pendidikan.</span></h2>
                <p class="text-gray-500">Riwayat pendidikan yang telah saya tempuh.</p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 max-w-4xl mx-auto">
                @foreach($pendidikans as $item)
                    <div class="bg-white/[0.03] border border-white/10 rounded-2xl p-6 hover:border-emerald-500/30 transition-all duration-300">
                        <span class="text-emerald-400 text-sm font-medium">{{ $item->tahun_mulai }} — {{ $item->tahun_selesai ?? 'Sekarang' }}</span>
                        <h3 class="text-xl font-bold text-white mt-2">{{ $item->jurusan }}</h3>
                        <p class="text-gray-400 text-sm mt-1">{{ $item->nama_institusi }}</p>
                        @if($item->deskripsi)
                            <p class="text-gray-500 text-sm mt-4 leading-relaxed">{{ $item->deskripsi }}</p>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    {{-- Pengalaman Section --}}
    <section id="pengalaman" class="py-20">
        <div class="max-w-6xl mx-auto px-6 sm:px-8">
            {{-- Header --}}
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-white mb-3">Pengalaman Organisasi</h2>
                <p class="text-gray-500">Pilih pengalaman organisasi yang ingin kamu lihat.</p>
            </div>

            {{-- 2 Foto HIMA & BEM --}}
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

    {{-- Project Section --}}
    @if($projects->count() > 0)
    <section id="project" class="py-20">
        <div class="max-w-6xl mx-auto px-6 sm:px-8">
            <div class="flex items-center justify-between mb-12">
                <div>
                    <h2 class="text-3xl font-bold text-white mb-2">Project</h2>
                    <p class="text-gray-500">Kumpulan project yang pernah saya kerjakan.</p>
                </div>
                <a href="{{ route('project') }}" class="hidden sm:inline-flex items-center gap-2 text-sm text-emerald-400 hover:text-emerald-300 transition-colors">
                    Lihat Semua
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                </a>
            </div>

            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-4">
                @foreach($projects as $item)
                    <div class="group bg-white/[0.02] border border-white/5 rounded-2xl overflow-hidden hover:bg-white/[0.04] hover:border-white/10 transition-all duration-300">
                        {{-- Image --}}
                        @if($item->gambar)
                            <div class="aspect-video overflow-hidden">
                                <img src="{{ asset('storage/' . $item->gambar) }}"
                                     alt="{{ $item->judul }}"
                                     class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                            </div>
                        @else
                            <div class="aspect-video bg-gradient-to-br from-gray-800 to-gray-900 flex items-center justify-center">
                                <svg class="w-12 h-12 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                            </div>
                        @endif

                        {{-- Info --}}
                        <div class="p-5">
                            <h3 class="font-semibold text-white mb-2">{{ $item->judul }}</h3>
                            @if($item->deskripsi)
                                <p class="text-sm text-gray-400 line-clamp-2 mb-4">{{ $item->deskripsi }}</p>
                            @endif

                            {{-- Tech Stack --}}
                            @if($item->teknologi)
                                <div class="flex flex-wrap gap-1.5 mb-4">
                                    @foreach(array_slice($item->teknologi, 0, 4) as $tech)
                                        <span class="px-2 py-0.5 bg-white/5 text-gray-400 text-xs rounded-md">{{ $tech }}</span>
                                    @endforeach
                                </div>
                            @endif

                            {{-- Links --}}
                            <div class="flex items-center gap-3">
                                @if($item->link_github)
                                    <a href="{{ $item->link_github }}" target="_blank"
                                       class="inline-flex items-center gap-1.5 text-sm text-gray-400 hover:text-white transition-colors">
                                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/></svg>
                                        GitHub
                                    </a>
                                @endif
                                @if($item->link_demo)
                                    <a href="{{ $item->link_demo }}" target="_blank"
                                       class="inline-flex items-center gap-1.5 text-sm text-emerald-400 hover:text-emerald-300 transition-colors">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                                        Demo
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="mt-6 sm:hidden text-center">
                <a href="{{ route('project') }}" class="inline-flex items-center gap-2 text-sm text-emerald-400 hover:text-emerald-300 transition-colors">
                    Lihat Semua Project
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                </a>
            </div>
        </div>
    </section>
    @endif

    {{-- Contact Section --}}
    <section class="py-20">
        <div class="max-w-6xl mx-auto px-6 sm:px-8">
            <div class="max-w-2xl mx-auto text-center">
                <h2 class="text-3xl font-bold text-white mb-4">Mari Terhubung</h2>
                <p class="text-gray-400 mb-8">Jangan ragu untuk menghubungi saya melalui media sosial atau email.</p>

                <div class="flex flex-wrap justify-center gap-4">
                    @if($profile->email)
                        <a href="mailto:{{ $profile->email }}"
                           class="inline-flex items-center gap-2 px-6 py-3 bg-emerald-500 hover:bg-emerald-400 text-black font-medium rounded-lg transition-colors duration-200">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                            Kirim Email
                        </a>
                    @endif
                    @if($profile->linkedin)
                        <a href="{{ $profile->linkedin }}" target="_blank"
                           class="inline-flex items-center gap-2 px-6 py-3 bg-white/5 border border-white/10 text-white font-medium rounded-lg hover:bg-white/10 transition-colors duration-200">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg>
                            LinkedIn
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </section>

</x-layouts.portfolio>
