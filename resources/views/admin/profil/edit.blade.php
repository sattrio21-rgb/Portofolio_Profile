<x-layouts.admin title="Edit Profil">

    <div class="mb-8">
        <h1 class="text-2xl font-bold text-gray-900 mb-1">Edit Profil</h1>
        <p class="text-gray-500">Kelola informasi profil kamu.</p>
    </div>

    <div class="bg-white rounded-2xl border border-gray-100 p-6">
        <form action="{{ route('admin.edit-profil.update') }}" method="POST" enctype="multipart/form-data">
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

</x-layouts.admin>
