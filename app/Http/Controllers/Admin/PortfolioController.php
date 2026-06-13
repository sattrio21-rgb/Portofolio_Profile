<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Profile;
use App\Models\Pengalaman;
use App\Models\Project;
use App\Models\Pendidikan;

class PortfolioController extends Controller
{
    // ==================== PROFIL ====================

    public function editProfil()
    {
        $profile = Profile::first() ?? new Profile();
        return view('admin.profil.edit', compact('profile'));
    }

    public function updateProfile(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'email' => 'nullable|email|max:255',
            'no_hp' => 'nullable|string|max:20',
            'instagram' => 'nullable|string|max:255',
            'linkedin' => 'nullable|string|max:255',
            'github' => 'nullable|string|max:255',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $profile = Profile::first() ?? new Profile();
        $profile->foto = $this->uploadFile($request, 'foto', 'foto-profile', $profile->foto);
        $profile->fill($validated);
        $profile->save();

        return redirect()->route('admin.edit-profil')->with('success', 'Profil berhasil diperbarui!');
    }

    // ==================== PENDIDIKAN ====================

    public function editPendidikan()
    {
        $pendidikans = Pendidikan::orderBy('tahun_mulai', 'asc')->get();
        return view('admin.pendidikan.edit', compact('pendidikans'));
    }

    public function storePendidikan(Request $request)
    {
        $validated = $request->validate([
            'nama_institusi' => 'required|string|max:255',
            'jurusan' => 'required|string|max:255',
            'tahun_mulai' => 'required|string|max:20',
            'tahun_selesai' => 'nullable|string|max:20',
            'deskripsi' => 'nullable|string',
        ]);

        Pendidikan::create($validated);

        return redirect()->route('admin.edit-pendidikan')->with('success', 'Pendidikan berhasil ditambahkan!');
    }

    public function updatePendidikan(Request $request, Pendidikan $pendidikan)
    {
        $validated = $request->validate([
            'nama_institusi' => 'required|string|max:255',
            'jurusan' => 'required|string|max:255',
            'tahun_mulai' => 'required|string|max:20',
            'tahun_selesai' => 'nullable|string|max:20',
            'deskripsi' => 'nullable|string',
        ]);

        $pendidikan->update($validated);

        return redirect()->route('admin.edit-pendidikan')->with('success', 'Pendidikan berhasil diperbarui!');
    }

    public function destroyPendidikan(Pendidikan $pendidikan)
    {
        $pendidikan->delete();
        return redirect()->route('admin.edit-pendidikan')->with('success', 'Pendidikan berhasil dihapus!');
    }

    // ==================== PENGALAMAN ====================

    public function editPengalaman()
    {
        $profile = Profile::first() ?? new Profile();
        $pengalamans = Pengalaman::orderBy('tanggal_mulai', 'desc')->get();
        return view('admin.pengalaman.edit', compact('profile', 'pengalamans'));
    }

    public function updateFotoOrganisasi(Request $request)
    {
        $request->validate([
            'foto_hima' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'judul_hima' => 'nullable|string|max:255',
            'deskripsi_hima' => 'nullable|string|max:255',
            'foto_bem' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'judul_bem' => 'nullable|string|max:255',
            'deskripsi_bem' => 'nullable|string|max:255',
        ]);

        $profile = Profile::first() ?? new Profile();
        $profile->foto_hima = $this->uploadFile($request, 'foto_hima', 'foto-organisasi', $profile->foto_hima);
        $profile->foto_bem = $this->uploadFile($request, 'foto_bem', 'foto-organisasi', $profile->foto_bem);
        $profile->fill($request->only(['judul_hima', 'deskripsi_hima', 'judul_bem', 'deskripsi_bem']));
        $profile->save();

        return redirect()->route('admin.edit-pengalaman')->with('success', 'Foto organisasi berhasil diperbarui!');
    }

    public function storePengalaman(Request $request)
    {
        $validated = $request->validate([
            'nama_organisasi' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'kategori' => 'required|in:hima,bem',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'nullable|date|after_or_equal:tanggal_mulai',
            'deskripsi' => 'nullable|string',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $validated['foto'] = $this->uploadFile($request, 'foto', 'foto-pengalaman');
        Pengalaman::create($validated);

        return redirect()->route('admin.edit-pengalaman')->with('success', 'Pengalaman berhasil ditambahkan!');
    }

    public function updatePengalaman(Request $request, Pengalaman $pengalaman)
    {
        $validated = $request->validate([
            'nama_organisasi' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'kategori' => 'required|in:hima,bem',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'nullable|date|after_or_equal:tanggal_mulai',
            'deskripsi' => 'nullable|string',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $validated['foto'] = $this->uploadFile($request, 'foto', 'foto-pengalaman', $pengalaman->foto);
        $pengalaman->update($validated);

        return redirect()->route('admin.edit-pengalaman')->with('success', 'Pengalaman berhasil diperbarui!');
    }

    public function destroyPengalaman(Pengalaman $pengalaman)
    {
        if ($pengalaman->foto) {
            \Storage::disk('public')->delete($pengalaman->foto);
        }
        $pengalaman->delete();

        return redirect()->route('admin.edit-pengalaman')->with('success', 'Pengalaman berhasil dihapus!');
    }

    // ==================== PROJECT ====================

    public function editProject()
    {
        $projects = Project::orderBy('created_at', 'desc')->get();
        return view('admin.project.edit', compact('projects'));
    }

    public function storeProject(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'link_github' => 'nullable|string|max:255',
            'link_demo' => 'nullable|string|max:255',
            'teknologi' => 'nullable|string',
        ]);

        $validated['teknologi'] = $this->parseTeknologi($request->teknologi);
        $validated['gambar'] = $this->uploadFile($request, 'gambar', 'gambar-project');
        Project::create($validated);

        return redirect()->route('admin.edit-project')->with('success', 'Project berhasil ditambahkan!');
    }

    public function updateProject(Request $request, Project $project)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'link_github' => 'nullable|string|max:255',
            'link_demo' => 'nullable|string|max:255',
            'teknologi' => 'nullable|string',
        ]);

        $validated['teknologi'] = $this->parseTeknologi($request->teknologi);
        $validated['gambar'] = $this->uploadFile($request, 'gambar', 'gambar-project', $project->gambar);
        $project->update($validated);

        return redirect()->route('admin.edit-project')->with('success', 'Project berhasil diperbarui!');
    }

    public function destroyProject(Project $project)
    {
        if ($project->gambar) {
            \Storage::disk('public')->delete($project->gambar);
        }
        $project->delete();

        return redirect()->route('admin.edit-project')->with('success', 'Project berhasil dihapus!');
    }

    // ==================== HELPERS ====================

    private function uploadFile(Request $request, string $fieldName, string $directory, ?string $oldFile = null): ?string
    {
        if (!$request->hasFile($fieldName)) {
            return $oldFile;
        }

        if ($oldFile) {
            \Storage::disk('public')->delete($oldFile);
        }

        return $request->file($fieldName)->store($directory, 'public');
    }

    private function parseTeknologi(?string $teknologi): ?array
    {
        if (!$teknologi) {
            return null;
        }

        return array_map('trim', explode(',', $teknologi));
    }
}
