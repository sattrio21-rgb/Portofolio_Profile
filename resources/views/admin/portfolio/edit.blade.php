<x-layouts.admin title="Edit Portfolio">

    <div class="mb-8">
        <h1 class="text-2xl font-bold text-gray-900 mb-1">Edit Portfolio</h1>
        <p class="text-gray-500">Kelola semua informasi portfolio kamu dalam satu halaman.</p>
    </div>

    <div class="bg-white rounded-2xl border border-gray-100 overflow-hidden">
        <div class="border-b border-gray-100">
            <nav class="flex">
                <button onclick="switchTab('profile')" id="tab-profile" data-tab="profile"
                        class="tab-btn active flex-1 px-6 py-4 text-sm font-semibold text-center border-b-2 transition-all duration-200">
                    <span class="flex items-center justify-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                        Profil
                    </span>
                </button>
                <button onclick="switchTab('pengalaman')" id="tab-pengalaman" data-tab="pengalaman"
                        class="tab-btn flex-1 px-6 py-4 text-sm font-semibold text-center border-b-2 transition-all duration-200">
                    <span class="flex items-center justify-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                        Pengalaman
                    </span>
                </button>
                <button onclick="switchTab('project')" id="tab-project" data-tab="project"
                        class="tab-btn flex-1 px-6 py-4 text-sm font-semibold text-center border-b-2 transition-all duration-200">
                    <span class="flex items-center justify-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/></svg>
                        Project
                    </span>
                </button>
            </nav>
        </div>

        <div class="p-6">

            {{-- ==================== PROFILE TAB ==================== --}}
            <div id="content-profile" class="tab-content">
                <form action="{{ route('admin.portfolio.profile.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="space-y-6">
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900 mb-4">Foto Profil</h3>
                            <div class="flex items-center gap-6">
                                <div class="shrink-0">
                                    @if($profile->foto)
                                        <img src="{{ asset('storage/' . $profile->foto) }}" alt="Foto" class="w-24 h-24 rounded-2xl object-cover border-4 border-gray-100">
                                    @else
                                        <div class="w-24 h-24 rounded-2xl bg-gray-100 flex items-center justify-center border-4 border-gray-50">
                                            <svg class="w-10 h-10 text-gray-300" fill="currentColor" viewBox="0 0 24 24"><path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/></svg>
                                        </div>
                                    @endif
                                </div>
                                <div class="flex-1">
                                    <input type="file" name="foto" accept="image/*"
                                           class="block w-full text-sm text-gray-500 file:mr-4 file:py-2.5 file:px-5 file:rounded-xl file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-600 hover:file:bg-blue-100 file:cursor-pointer">
                                    <p class="text-xs text-gray-400 mt-2">JPG, PNG, atau WebP. Maksimal 2MB.</p>
                                </div>
                            </div>
                        </div>
                        <hr class="border-gray-100">
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900 mb-4">Informasi Dasar</h3>
                            <div class="space-y-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1.5">Nama Lengkap</label>
                                    <input type="text" name="nama" value="{{ old('nama', $profile->nama) }}" placeholder="Masukkan nama lengkap"
                                           class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1.5">Deskripsi / Bio</label>
                                    <textarea name="deskripsi" rows="3" placeholder="Ceritakan tentang diri kamu..."
                                              class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all resize-none">{{ old('deskripsi', $profile->deskripsi) }}</textarea>
                                </div>
                            </div>
                        </div>
                        <hr class="border-gray-100">
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900 mb-4">Informasi Kontak</h3>
                            <div class="grid sm:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1.5">Email</label>
                                    <input type="email" name="email" value="{{ old('email', $profile->email) }}" placeholder="email@contoh.com"
                                           class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1.5">No. HP</label>
                                    <input type="text" name="no_hp" value="{{ old('no_hp', $profile->no_hp) }}" placeholder="08xxxxxxxxxx"
                                           class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all">
                                </div>
                            </div>
                        </div>
                        <hr class="border-gray-100">
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900 mb-4">Media Sosial</h3>
                            <div class="space-y-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1.5">Instagram</label>
                                    <input type="url" name="instagram" value="{{ old('instagram', $profile->instagram) }}" placeholder="https://instagram.com/username"
                                           class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1.5">LinkedIn</label>
                                    <input type="url" name="linkedin" value="{{ old('linkedin', $profile->linkedin) }}" placeholder="https://linkedin.com/in/username"
                                           class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1.5">GitHub</label>
                                    <input type="url" name="github" value="{{ old('github', $profile->github) }}" placeholder="https://github.com/username"
                                           class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all">
                                </div>
                            </div>
                        </div>
                        <div class="flex justify-end pt-4">
                            <button type="submit" class="px-6 py-2.5 text-sm font-semibold text-white bg-blue-600 rounded-xl hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all shadow-lg shadow-blue-500/25">
                                Simpan Profil
                            </button>
                        </div>
                    </div>
                </form>
            </div>

            {{-- ==================== PENGALAMAN TAB ==================== --}}
            <div id="content-pengalaman" class="tab-content hidden">

                <div class="mb-6 bg-gray-50 rounded-2xl p-6 border border-gray-200">
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Foto Organisasi</h3>
                    <p class="text-sm text-gray-500 mb-4">Upload foto untuk halaman pengalaman HIMA dan BEM.</p>
                    <form action="{{ route('admin.portfolio.foto-organisasi.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="grid sm:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Foto HIMA</label>
                                <div class="flex items-center gap-4">
                                    <div class="shrink-0">
                                        @if($profile->foto_hima)
                                            <img src="{{ asset('storage/' . $profile->foto_hima) }}" alt="Foto HIMA" class="w-20 h-20 rounded-xl object-cover border-2 border-gray-200">
                                        @else
                                            <div class="w-20 h-20 rounded-xl bg-emerald-100 flex items-center justify-center border-2 border-dashed border-gray-300">
                                                <svg class="w-8 h-8 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="flex-1">
                                        <input type="file" name="foto_hima" accept="image/*"
                                               class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-emerald-50 file:text-emerald-600 hover:file:bg-emerald-100 file:cursor-pointer">
                                        <p class="text-xs text-gray-400 mt-1">Foto untuk kartu HIMA</p>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Judul HIMA</label>
                                    <input type="text" name="judul_hima" value="{{ $profile->judul_hima ?? 'HIMA' }}" placeholder="Contoh: HIMA"
                                           class="w-full px-3 py-2 bg-white border border-gray-200 rounded-lg text-sm focus:ring-2 focus:ring-blue-500">
                                </div>
                                <div class="mt-2">
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Deskripsi HIMA</label>
                                    <input type="text" name="deskripsi_hima" value="{{ $profile->deskripsi_hima ?? 'Himpunan Mahasiswa Informatika' }}" placeholder="Deskripsi singkat"
                                           class="w-full px-3 py-2 bg-white border border-gray-200 rounded-lg text-sm focus:ring-2 focus:ring-blue-500">
                                </div>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Foto BEM</label>
                                <div class="flex items-center gap-4">
                                    <div class="shrink-0">
                                        @if($profile->foto_bem)
                                            <img src="{{ asset('storage/' . $profile->foto_bem) }}" alt="Foto BEM" class="w-20 h-20 rounded-xl object-cover border-2 border-gray-200">
                                        @else
                                            <div class="w-20 h-20 rounded-xl bg-blue-100 flex items-center justify-center border-2 border-dashed border-gray-300">
                                                <svg class="w-8 h-8 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="flex-1">
                                        <input type="file" name="foto_bem" accept="image/*"
                                               class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-emerald-50 file:text-emerald-600 hover:file:bg-emerald-100 file:cursor-pointer">
                                        <p class="text-xs text-gray-400 mt-1">Foto untuk kartu BEM</p>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Judul BEM</label>
                                    <input type="text" name="judul_bem" value="{{ $profile->judul_bem ?? 'BEM' }}" placeholder="Contoh: BEM"
                                           class="w-full px-3 py-2 bg-white border border-gray-200 rounded-lg text-sm focus:ring-2 focus:ring-blue-500">
                                </div>
                                <div class="mt-2">
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Deskripsi BEM</label>
                                    <input type="text" name="deskripsi_bem" value="{{ $profile->deskripsi_bem ?? 'Badan Eksekutif Mahasiswa' }}" placeholder="Deskripsi singkat"
                                           class="w-full px-3 py-2 bg-white border border-gray-200 rounded-lg text-sm focus:ring-2 focus:ring-blue-500">
                                </div>
                            </div>
                        </div>
                        <div class="flex justify-end pt-14 pb-6">
                            <button type="submit" class="px-6 py-2.5 text-sm font-semibold text-white bg-blue-600 rounded-xl hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all shadow-lg shadow-blue-500/25">
                                Simpan
                            </button>
                        </div>
                    </form>
                </div>

                <hr class="border-gray-200 mb-6">

                <div class="mb-6 flex items-center justify-between">
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900">Daftar Pengalaman</h3>
                        <p class="text-sm text-gray-500">Kelola pengalaman organisasi kamu.</p>
                    </div>
                    <button onclick="showForm('form-pengalaman-create')"
                            class="inline-flex items-center gap-2 px-4 py-2 bg-blue-600 text-white text-sm font-semibold rounded-xl hover:bg-blue-700 transition-all">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                        Tambah
                    </button>
                </div>

                <div id="form-pengalaman-create" class="hidden mb-6 bg-gray-50 rounded-2xl p-6 border border-gray-200">
                    <h4 class="font-semibold text-gray-900 mb-4">Tambah Pengalaman Baru</h4>
                    <form action="{{ route('admin.portfolio.pengalaman.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="space-y-4">
                            <div class="grid sm:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1.5">Nama Organisasi</label>
                                    <input type="text" name="nama_organisasi" required placeholder="Contoh: Himpunan Mahasiswa"
                                           class="w-full px-4 py-2.5 bg-white border border-gray-200 rounded-xl text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1.5">Kategori</label>
                                    <select name="kategori" required class="w-full px-4 py-2.5 bg-white border border-gray-200 rounded-xl text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                        <option value="hima">HIMA</option>
                                        <option value="bem">BEM</option>
                                    </select>
                                </div>
                            </div>
                            <div class="grid sm:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1.5">Jabatan</label>
                                    <input type="text" name="jabatan" required placeholder="Contoh: Ketua Divisi"
                                           class="w-full px-4 py-2.5 bg-white border border-gray-200 rounded-xl text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1.5">Tanggal Mulai</label>
                                    <input type="date" name="tanggal_mulai" required
                                           class="w-full px-4 py-2.5 bg-white border border-gray-200 rounded-xl text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                </div>
                            </div>
                            <div class="grid sm:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1.5">Tanggal Selesai <span class="text-gray-400 font-normal">(opsional)</span></label>
                                    <input type="date" name="tanggal_selesai"
                                           class="w-full px-4 py-2.5 bg-white border border-gray-200 rounded-xl text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1.5">Foto <span class="text-gray-400 font-normal">(opsional)</span></label>
                                    <input type="file" name="foto" accept="image/*"
                                           class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-600 hover:file:bg-blue-100 file:cursor-pointer">
                                </div>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1.5">Deskripsi <span class="text-gray-400 font-normal">(opsional)</span></label>
                                <textarea name="deskripsi" rows="3" placeholder="Jelaskan tentang pengalaman kamu..."
                                          class="w-full px-4 py-2.5 bg-white border border-gray-200 rounded-xl text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 resize-none"></textarea>
                            </div>
                        </div>
                        <div class="flex justify-end gap-3 mt-4">
                            <button type="button" onclick="hideForm('form-pengalaman-create')"
                                    class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-200 rounded-xl hover:bg-gray-50">Batal</button>
                            <button type="submit"
                                    class="px-5 py-2 text-sm font-semibold text-white bg-blue-600 rounded-xl hover:bg-blue-700">Simpan</button>
                        </div>
                    </form>
                </div>

                @if($pengalamans->count() > 0)
                    <div class="space-y-3">
                        @foreach($pengalamans as $item)
                            <div class="bg-gray-50 rounded-xl p-4 flex items-center gap-4">
                                <div class="shrink-0">
                                    @if($item->foto)
                                        <img src="{{ asset('storage/' . $item->foto) }}" alt="" class="w-12 h-12 rounded-xl object-cover">
                                    @else
                                        <div class="w-12 h-12 rounded-xl bg-emerald-100 flex items-center justify-center">
                                            <svg class="w-6 h-6 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                                        </div>
                                    @endif
                                </div>
                                <div class="flex-1 min-w-0">
                                    <div class="flex items-center gap-2">
                                        <h4 class="font-semibold text-gray-900 truncate">{{ $item->nama_organisasi }}</h4>
                                        @if($item->kategori === 'hima')
                                            <span class="px-2 py-0.5 bg-emerald-100 text-emerald-700 text-xs font-medium rounded-full">HIMA</span>
                                        @else
                                            <span class="px-2 py-0.5 bg-blue-100 text-blue-700 text-xs font-medium rounded-full">BEM</span>
                                        @endif
                                    </div>
                                    <p class="text-sm text-blue-600">{{ $item->jabatan }}</p>
                                    <p class="text-xs text-gray-400">
                                        {{ $item->tanggal_mulai->format('M Y') }}
                                        @if($item->tanggal_selesai) — {{ $item->tanggal_selesai->format('M Y') }} @else — Sekarang @endif
                                    </p>
                                </div>
                                <div class="flex items-center gap-2 shrink-0">
                                    <button onclick="toggleEditPengalaman({{ $item->id }})"
                                            class="p-2 text-gray-400 hover:text-blue-600 hover:bg-blue-50 rounded-lg transition-all">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                                    </button>
                                    <form action="{{ route('admin.portfolio.pengalaman.destroy', $item) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="p-2 text-gray-400 hover:text-red-600 hover:bg-red-50 rounded-lg transition-all">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                        </button>
                                    </form>
                                </div>
                            </div>

                            <div id="edit-pengalaman-{{ $item->id }}" class="hidden bg-blue-50 rounded-xl p-4 border border-blue-200">
                                <form action="{{ route('admin.portfolio.pengalaman.update', $item) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="space-y-4">
                                        <div class="grid sm:grid-cols-2 gap-4">
                                            <div>
                                                <label class="block text-sm font-medium text-gray-700 mb-1.5">Nama Organisasi</label>
                                                <input type="text" name="nama_organisasi" value="{{ $item->nama_organisasi }}" required
                                                       class="w-full px-4 py-2.5 bg-white border border-gray-200 rounded-xl text-sm focus:ring-2 focus:ring-blue-500">
                                            </div>
                                            <div>
                                                <label class="block text-sm font-medium text-gray-700 mb-1.5">Kategori</label>
                                                <select name="kategori" required class="w-full px-4 py-2.5 bg-white border border-gray-200 rounded-xl text-sm focus:ring-2 focus:ring-blue-500">
                                                    <option value="hima" {{ $item->kategori === 'hima' ? 'selected' : '' }}>HIMA</option>
                                                    <option value="bem" {{ $item->kategori === 'bem' ? 'selected' : '' }}>BEM</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="grid sm:grid-cols-2 gap-4">
                                            <div>
                                                <label class="block text-sm font-medium text-gray-700 mb-1.5">Jabatan</label>
                                                <input type="text" name="jabatan" value="{{ $item->jabatan }}" required
                                                       class="w-full px-4 py-2.5 bg-white border border-gray-200 rounded-xl text-sm focus:ring-2 focus:ring-blue-500">
                                            </div>
                                            <div>
                                                <label class="block text-sm font-medium text-gray-700 mb-1.5">Tanggal Mulai</label>
                                                <input type="date" name="tanggal_mulai" value="{{ $item->tanggal_mulai?->format('Y-m-d') }}" required
                                                       class="w-full px-4 py-2.5 bg-white border border-gray-200 rounded-xl text-sm focus:ring-2 focus:ring-blue-500">
                                            </div>
                                        </div>
                                        <div class="grid sm:grid-cols-2 gap-4">
                                            <div>
                                                <label class="block text-sm font-medium text-gray-700 mb-1.5">Tanggal Selesai</label>
                                                <input type="date" name="tanggal_selesai" value="{{ $item->tanggal_selesai?->format('Y-m-d') }}"
                                                       class="w-full px-4 py-2.5 bg-white border border-gray-200 rounded-xl text-sm focus:ring-2 focus:ring-blue-500">
                                            </div>
                                            <div>
                                                <label class="block text-sm font-medium text-gray-700 mb-1.5">Foto</label>
                                                <input type="file" name="foto" accept="image/*"
                                                       class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-600">
                                                <p class="text-xs text-gray-400 mt-1">Kosongkan jika tidak diubah.</p>
                                            </div>
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-1.5">Deskripsi</label>
                                            <textarea name="deskripsi" rows="3"
                                                      class="w-full px-4 py-2.5 bg-white border border-gray-200 rounded-xl text-sm focus:ring-2 focus:ring-blue-500 resize-none">{{ $item->deskripsi }}</textarea>
                                        </div>
                                    </div>
                                    <div class="flex justify-end gap-3 mt-4">
                                        <button type="button" onclick="toggleEditPengalaman({{ $item->id }})"
                                                class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-200 rounded-lg hover:bg-gray-50">Batal</button>
                                        <button type="submit"
                                                class="px-5 py-2 text-sm font-semibold text-white bg-blue-600 rounded-lg hover:bg-blue-700">Update</button>
                                    </div>
                                </form>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="text-center py-12 bg-gray-50 rounded-2xl">
                        <svg class="w-12 h-12 text-gray-300 mx-auto mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                        <p class="text-gray-500">Belum ada pengalaman.</p>
                    </div>
                @endif
            </div>

            {{-- ==================== PROJECT TAB ==================== --}}
            <div id="content-project" class="tab-content hidden">

                <div class="mb-6 flex items-center justify-between">
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900">Daftar Project</h3>
                        <p class="text-sm text-gray-500">Kelola project portfolio kamu.</p>
                    </div>
                    <button onclick="showForm('form-project-create')"
                            class="inline-flex items-center gap-2 px-4 py-2 bg-blue-600 text-white text-sm font-semibold rounded-xl hover:bg-blue-700 transition-all">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                        Tambah
                    </button>
                </div>

                <div id="form-project-create" class="hidden mb-6 bg-gray-50 rounded-2xl p-6 border border-gray-200">
                    <h4 class="font-semibold text-gray-900 mb-4">Tambah Project Baru</h4>
                    <form action="{{ route('admin.portfolio.project.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="space-y-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1.5">Judul Project</label>
                                <input type="text" name="judul" required placeholder="Contoh: E-Commerce Platform"
                                       class="w-full px-4 py-2.5 bg-white border border-gray-200 rounded-xl text-sm focus:ring-2 focus:ring-blue-500">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1.5">Deskripsi <span class="text-gray-400 font-normal">(opsional)</span></label>
                                <textarea name="deskripsi" rows="3" placeholder="Jelaskan tentang project ini..."
                                          class="w-full px-4 py-2.5 bg-white border border-gray-200 rounded-xl text-sm focus:ring-2 focus:ring-blue-500 resize-none"></textarea>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1.5">Gambar <span class="text-gray-400 font-normal">(opsional)</span></label>
                                <input type="file" name="gambar" accept="image/*"
                                       class="block w-full text-sm text-gray-500 file:mr-4 file:py-2.5 file:px-5 file:rounded-xl file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-600 hover:file:bg-blue-100 file:cursor-pointer">
                            </div>
                            <div class="grid sm:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1.5">Link GitHub <span class="text-gray-400 font-normal">(opsional)</span></label>
                                    <input type="url" name="link_github" placeholder="https://github.com/..."
                                           class="w-full px-4 py-2.5 bg-white border border-gray-200 rounded-xl text-sm focus:ring-2 focus:ring-blue-500">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1.5">Link Demo <span class="text-gray-400 font-normal">(opsional)</span></label>
                                    <input type="url" name="link_demo" placeholder="https://..."
                                           class="w-full px-4 py-2.5 bg-white border border-gray-200 rounded-xl text-sm focus:ring-2 focus:ring-blue-500">
                                </div>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1.5">Teknologi <span class="text-gray-400 font-normal">(opsional, pisahkan dengan koma)</span></label>
                                <input type="text" name="teknologi" placeholder="Laravel, Tailwind CSS, MySQL"
                                       class="w-full px-4 py-2.5 bg-white border border-gray-200 rounded-xl text-sm focus:ring-2 focus:ring-blue-500">
                            </div>
                        </div>
                        <div class="flex justify-end gap-3 mt-4">
                            <button type="button" onclick="hideForm('form-project-create')"
                                    class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-200 rounded-xl hover:bg-gray-50">Batal</button>
                            <button type="submit"
                                    class="px-5 py-2 text-sm font-semibold text-white bg-blue-600 rounded-xl hover:bg-blue-700">Simpan</button>
                        </div>
                    </form>
                </div>

                @if($projects->count() > 0)
                    <div class="space-y-4">
                        @foreach($projects as $item)
                            <div class="bg-gray-50 rounded-xl p-4">
                                <div class="flex items-start gap-4">
                                    @if($item->gambar)
                                        <img src="{{ asset('storage/' . $item->gambar) }}" alt="" class="w-20 h-14 rounded-lg object-cover shrink-0">
                                    @else
                                        <div class="w-20 h-14 rounded-lg bg-gradient-to-br from-gray-200 to-gray-300 flex items-center justify-center shrink-0">
                                            <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                        </div>
                                    @endif
                                    <div class="flex-1 min-w-0">
                                        <h4 class="font-semibold text-gray-900 mb-1">{{ $item->judul }}</h4>
                                        @if($item->deskripsi)
                                            <p class="text-sm text-gray-500 line-clamp-2 mb-2">{{ $item->deskripsi }}</p>
                                        @endif
                                        @if($item->teknologi)
                                            <div class="flex flex-wrap gap-1 mb-3">
                                                @foreach(array_slice($item->teknologi, 0, 5) as $tech)
                                                    <span class="px-2 py-0.5 bg-white text-gray-600 text-xs rounded-lg">{{ $tech }}</span>
                                                @endforeach
                                            </div>
                                        @endif
                                        <div class="flex items-center gap-2">
                                            <button onclick="toggleEditProject({{ $item->id }})"
                                                    class="px-3 py-1.5 text-xs font-medium text-gray-700 bg-white border border-gray-200 rounded-lg hover:bg-gray-100 transition-all">Edit</button>
                                            <form action="{{ route('admin.portfolio.project.destroy', $item) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="px-3 py-1.5 text-xs font-medium text-red-600 bg-red-50 border border-red-200 rounded-lg hover:bg-red-100 transition-all">Hapus</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div id="edit-project-{{ $item->id }}" class="hidden bg-blue-50 rounded-xl p-5 border border-blue-200">
                                <h4 class="font-semibold text-gray-900 mb-4">Edit: {{ $item->judul }}</h4>
                                <form action="{{ route('admin.portfolio.project.update', $item) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="space-y-4">
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-1.5">Judul</label>
                                            <input type="text" name="judul" value="{{ $item->judul }}" required
                                                   class="w-full px-4 py-2.5 bg-white border border-gray-200 rounded-xl text-sm focus:ring-2 focus:ring-blue-500">
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-1.5">Deskripsi</label>
                                            <textarea name="deskripsi" rows="3"
                                                      class="w-full px-4 py-2.5 bg-white border border-gray-200 rounded-xl text-sm focus:ring-2 focus:ring-blue-500 resize-none">{{ $item->deskripsi }}</textarea>
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-1.5">Gambar</label>
                                            <input type="file" name="gambar" accept="image/*"
                                                   class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-600">
                                            <p class="text-xs text-gray-400 mt-1">Kosongkan jika tidak diubah.</p>
                                        </div>
                                        <div class="grid sm:grid-cols-2 gap-4">
                                            <div>
                                                <label class="block text-sm font-medium text-gray-700 mb-1.5">Link GitHub</label>
                                                <input type="url" name="link_github" value="{{ $item->link_github }}"
                                                       class="w-full px-4 py-2.5 bg-white border border-gray-200 rounded-xl text-sm focus:ring-2 focus:ring-blue-500">
                                            </div>
                                            <div>
                                                <label class="block text-sm font-medium text-gray-700 mb-1.5">Link Demo</label>
                                                <input type="url" name="link_demo" value="{{ $item->link_demo }}"
                                                       class="w-full px-4 py-2.5 bg-white border border-gray-200 rounded-xl text-sm focus:ring-2 focus:ring-blue-500">
                                            </div>
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-1.5">Teknologi</label>
                                            <input type="text" name="teknologi" value="{{ $item->teknologi ? implode(', ', $item->teknologi) : '' }}"
                                                   class="w-full px-4 py-2.5 bg-white border border-gray-200 rounded-xl text-sm focus:ring-2 focus:ring-blue-500">
                                        </div>
                                    </div>
                                    <div class="flex justify-end gap-3 mt-4">
                                        <button type="button" onclick="toggleEditProject({{ $item->id }})"
                                                class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-200 rounded-lg hover:bg-gray-50">Batal</button>
                                        <button type="submit"
                                                class="px-5 py-2 text-sm font-semibold text-white bg-blue-600 rounded-lg hover:bg-blue-700">Update</button>
                                    </div>
                                </form>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="text-center py-12 bg-gray-50 rounded-2xl">
                        <svg class="w-12 h-12 text-gray-300 mx-auto mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/></svg>
                        <p class="text-gray-500">Belum ada project.</p>
                    </div>
                @endif
            </div>

        </div>
    </div>

    <style>
        .tab-btn { color: #6b7280; border-color: transparent; }
        .tab-btn.active { color: #2563eb; border-color: #2563eb; }
        .tab-btn:hover:not(.active) { color: #374151; background-color: #f9fafb; }
    </style>

    <script>
        function switchTab(tab) {
            // Hide all content
            var all = document.querySelectorAll('.tab-content');
            for (var i = 0; i < all.length; i++) {
                all[i].classList.add('hidden');
            }
            // Remove active from all buttons
            var btns = document.querySelectorAll('.tab-btn');
            for (var i = 0; i < btns.length; i++) {
                btns[i].classList.remove('active');
            }
            // Show selected content
            var el = document.getElementById('content-' + tab);
            if (el) el.classList.remove('hidden');
            // Activate selected button
            var btn = document.getElementById('tab-' + tab);
            if (btn) btn.classList.add('active');
        }
        function showForm(id) {
            var el = document.getElementById(id);
            if (el) el.classList.remove('hidden');
        }
        function hideForm(id) {
            var el = document.getElementById(id);
            if (el) el.classList.add('hidden');
        }
        function toggleEditPengalaman(id) {
            var el = document.getElementById('edit-pengalaman-' + id);
            if (el) el.classList.toggle('hidden');
        }
        function toggleEditProject(id) {
            var el = document.getElementById('edit-project-' + id);
            if (el) el.classList.toggle('hidden');
        }
        // Init from URL hash
        var h = window.location.hash.replace('#', '');
        if (h === 'pengalaman' || h === 'project') { switchTab(h); }
        else { switchTab('profile'); }
    </script>

</x-layouts.admin>
