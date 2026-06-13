<x-layouts.admin title="Edit Pendidikan">

    <div class="mb-8">
        <h1 class="text-2xl font-bold text-gray-900 mb-1">Edit Pendidikan</h1>
        <p class="text-gray-500">Kelola latar belakang pendidikan kamu.</p>
    </div>

    <div class="bg-white rounded-2xl border border-gray-100 p-6">
        <div class="mb-6 flex items-center justify-between">
            <div>
                <h3 class="text-lg font-semibold text-gray-900">Daftar Pendidikan</h3>
                <p class="text-sm text-gray-500">Kelola riwayat pendidikan kamu.</p>
            </div>
            <button onclick="showForm('form-pendidikan-create')"
                    class="inline-flex items-center gap-2 px-4 py-2 bg-blue-600 text-white text-sm font-semibold rounded-xl hover:bg-blue-700 transition-all">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                Tambah
            </button>
        </div>

        {{-- Form Tambah --}}
        <div id="form-pendidikan-create" class="hidden mb-6 bg-gray-50 rounded-2xl p-6 border border-gray-200">
            <h4 class="font-semibold text-gray-900 mb-4">Tambah Pendidikan Baru</h4>
            <form action="{{ route('admin.edit-pendidikan.store') }}" method="POST">
                @csrf
                <div class="space-y-4">
                    <div class="grid sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1.5">Tahun Mulai</label>
                            <input type="text" name="tahun_mulai" required placeholder="Contoh: 2021"
                                   class="w-full px-4 py-2.5 bg-white border border-gray-200 rounded-xl text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1.5">Tahun Selesai <span class="text-gray-400 font-normal">(opsional)</span></label>
                            <input type="text" name="tahun_selesai" placeholder="Contoh: 2024 atau Kosongkan jika masih aktif"
                                   class="w-full px-4 py-2.5 bg-white border border-gray-200 rounded-xl text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1.5">Jurusan / Program Studi</label>
                        <input type="text" name="jurusan" required placeholder="Contoh: Ilmu Pengetahuan Alam"
                               class="w-full px-4 py-2.5 bg-white border border-gray-200 rounded-xl text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1.5">Nama Institusi / Sekolah</label>
                        <input type="text" name="nama_institusi" required placeholder="Contoh: SMAN 4 Bekasi"
                               class="w-full px-4 py-2.5 bg-white border border-gray-200 rounded-xl text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1.5">Deskripsi <span class="text-gray-400 font-normal">(opsional)</span></label>
                        <textarea name="deskripsi" rows="3" placeholder="Ceritakan tentang pengalaman pendidikan kamu..."
                                  class="w-full px-4 py-2.5 bg-white border border-gray-200 rounded-xl text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 resize-none"></textarea>
                    </div>
                </div>
                <div class="flex justify-end gap-3 mt-4">
                    <button type="button" onclick="hideForm('form-pendidikan-create')"
                            class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-200 rounded-xl hover:bg-gray-50">Batal</button>
                    <button type="submit"
                            class="px-5 py-2 text-sm font-semibold text-white bg-blue-600 rounded-xl hover:bg-blue-700">Simpan</button>
                </div>
            </form>
        </div>

        {{-- List Pendidikan --}}
        @if($pendidikans->count() > 0)
            <div class="space-y-3">
                @foreach($pendidikans as $item)
                    <div class="bg-gray-50 rounded-xl p-4 flex items-center gap-4">
                        <div class="shrink-0 w-12 h-12 rounded-xl bg-blue-100 flex items-center justify-center">
                            <svg class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.999 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222"/></svg>
                        </div>
                        <div class="flex-1 min-w-0">
                            <h4 class="font-semibold text-gray-900 truncate">{{ $item->nama_institusi }}</h4>
                            <p class="text-sm text-blue-600">{{ $item->jurusan }}</p>
                            <p class="text-xs text-gray-400">
                                {{ $item->tahun_mulai }}
                                @if($item->tahun_selesai) — {{ $item->tahun_selesai }} @else — Sekarang @endif
                            </p>
                        </div>
                        <div class="flex items-center gap-2 shrink-0">
                            <button onclick="toggleEditPendidikan({{ $item->id }})"
                                    class="p-2 text-gray-400 hover:text-blue-600 hover:bg-blue-50 rounded-lg transition-all">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                            </button>
                            <form action="{{ route('admin.edit-pendidikan.destroy', $item) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="p-2 text-gray-400 hover:text-red-600 hover:bg-red-50 rounded-lg transition-all">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                </button>
                            </form>
                        </div>
                    </div>

                    {{-- Form Edit --}}
                    <div id="edit-pendidikan-{{ $item->id }}" class="hidden bg-blue-50 rounded-xl p-4 border border-blue-200">
                        <form action="{{ route('admin.edit-pendidikan.update', $item) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="space-y-4">
                                <div class="grid sm:grid-cols-2 gap-4">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1.5">Tahun Mulai</label>
                                        <input type="text" name="tahun_mulai" value="{{ $item->tahun_mulai }}" required
                                               class="w-full px-4 py-2.5 bg-white border border-gray-200 rounded-xl text-sm focus:ring-2 focus:ring-blue-500">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1.5">Tahun Selesai</label>
                                        <input type="text" name="tahun_selesai" value="{{ $item->tahun_selesai }}"
                                               class="w-full px-4 py-2.5 bg-white border border-gray-200 rounded-xl text-sm focus:ring-2 focus:ring-blue-500">
                                    </div>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1.5">Jurusan / Program Studi</label>
                                    <input type="text" name="jurusan" value="{{ $item->jurusan }}" required
                                           class="w-full px-4 py-2.5 bg-white border border-gray-200 rounded-xl text-sm focus:ring-2 focus:ring-blue-500">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1.5">Nama Institusi / Sekolah</label>
                                    <input type="text" name="nama_institusi" value="{{ $item->nama_institusi }}" required
                                           class="w-full px-4 py-2.5 bg-white border border-gray-200 rounded-xl text-sm focus:ring-2 focus:ring-blue-500">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1.5">Deskripsi</label>
                                    <textarea name="deskripsi" rows="3"
                                              class="w-full px-4 py-2.5 bg-white border border-gray-200 rounded-xl text-sm focus:ring-2 focus:ring-blue-500 resize-none">{{ $item->deskripsi }}</textarea>
                                </div>
                            </div>
                            <div class="flex justify-end gap-3 mt-4">
                                <button type="button" onclick="toggleEditPendidikan({{ $item->id }})"
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
                <svg class="w-12 h-12 text-gray-300 mx-auto mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.999 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222"/></svg>
                <p class="text-gray-500">Belum ada data pendidikan.</p>
            </div>
        @endif
    </div>

    <script>
        function showForm(id) {
            var el = document.getElementById(id);
            if (el) el.classList.remove('hidden');
        }
        function hideForm(id) {
            var el = document.getElementById(id);
            if (el) el.classList.add('hidden');
        }
        function toggleEditPendidikan(id) {
            var el = document.getElementById('edit-pendidikan-' + id);
            if (el) el.classList.toggle('hidden');
        }
    </script>

</x-layouts.admin>
