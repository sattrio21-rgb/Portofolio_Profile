<x-layouts.admin title="Edit Project">

    <div class="mb-8">
        <h1 class="text-2xl font-bold text-gray-900 mb-1">Edit Project</h1>
        <p class="text-gray-500">Kelola project portfolio kamu.</p>
    </div>

    <div class="bg-white rounded-2xl border border-gray-100 p-6">
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
            <form action="{{ route('admin.edit-project.store') }}" method="POST" enctype="multipart/form-data">
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
                                    <form action="{{ route('admin.edit-project.destroy', $item) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus?')">
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
                        <form action="{{ route('admin.edit-project.update', $item) }}" method="POST" enctype="multipart/form-data">
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

    <script>
        function showForm(id) {
            var el = document.getElementById(id);
            if (el) el.classList.remove('hidden');
        }
        function hideForm(id) {
            var el = document.getElementById(id);
            if (el) el.classList.add('hidden');
        }
        function toggleEditProject(id) {
            var el = document.getElementById('edit-project-' + id);
            if (el) el.classList.toggle('hidden');
        }
    </script>

</x-layouts.admin>
