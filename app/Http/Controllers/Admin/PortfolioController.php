<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Profile;
use App\Models\Pengalaman;
use App\Models\Project;

class PortfolioController extends Controller
{
    /**
     * Halaman Edit Profil.
     */
    public function editProfil()
    {
        $profile = Profile::first() ?? new Profile();
        return view('admin.profil.edit', compact('profile'));
    }

    /**
     * Update profile information.
     */
    public function updateProfile(Request $request)
    {
        $request->validate([
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

        if ($request->hasFile('foto')) {
            if ($profile->foto) {
                \Storage::disk('public')->delete($profile->foto);
            }
            $path = $request->file('foto')->store('foto-profile', 'public');
            $profile->foto = $path;
        }

        $profile->fill($request->only([
            'nama',
            'deskripsi',
            'email',
            'no_hp',
            'instagram',
            'linkedin',
            'github',
        ]));
        $profile->save();

        return redirect()->route('admin.edit-profil')->with('success', 'Profil berhasil diperbarui!');
    }

    /**
     * Halaman Edit Pengalaman.
     */
    public function editPengalaman()
    {
        $profile = Profile::first() ?? new Profile();
        $pengalamans = Pengalaman::orderBy('tanggal_mulai', 'desc')->get();
        return view('admin.pengalaman.edit', compact('profile', 'pengalamans'));
    }

    /**
     * Update foto organisasi (HIMA & BEM).
     */
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

        if ($request->hasFile('foto_hima')) {
            if ($profile->foto_hima) {
                \Storage::disk('public')->delete($profile->foto_hima);
            }
            $path = $request->file('foto_hima')->store('foto-organisasi', 'public');
            $profile->foto_hima = $path;
        }

        if ($request->hasFile('foto_bem')) {
            if ($profile->foto_bem) {
                \Storage::disk('public')->delete($profile->foto_bem);
            }
            $path = $request->file('foto_bem')->store('foto-organisasi', 'public');
            $profile->foto_bem = $path;
        }

        $profile->fill($request->only([
            'judul_hima',
            'deskripsi_hima',
            'judul_bem',
            'deskripsi_bem',
        ]));
        $profile->save();

        return redirect()->route('admin.edit-pengalaman')->with('success', 'Foto organisasi berhasil diperbarui!');
    }

    /**
     * Store new pengalaman.
     */
    public function storePengalaman(Request $request)
    {
        $request->validate([
            'nama_organisasi' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'kategori' => 'required|in:hima,bem',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'nullable|date|after_or_equal:tanggal_mulai',
            'deskripsi' => 'nullable|string',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $data = $request->only([
            'nama_organisasi',
            'jabatan',
            'kategori',
            'tanggal_mulai',
            'tanggal_selesai',
            'deskripsi',
        ]);

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('foto-pengalaman', 'public');
        }

        Pengalaman::create($data);

        return redirect()->route('admin.edit-pengalaman')->with('success', 'Pengalaman berhasil ditambahkan!');
    }

    /**
     * Update existing pengalaman.
     */
    public function updatePengalaman(Request $request, Pengalaman $pengalaman)
    {
        $request->validate([
            'nama_organisasi' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'kategori' => 'required|in:hima,bem',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'nullable|date|after_or_equal:tanggal_mulai',
            'deskripsi' => 'nullable|string',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $data = $request->only([
            'nama_organisasi',
            'jabatan',
            'kategori',
            'tanggal_mulai',
            'tanggal_selesai',
            'deskripsi',
        ]);

        if ($request->hasFile('foto')) {
            if ($pengalaman->foto) {
                \Storage::disk('public')->delete($pengalaman->foto);
            }
            $data['foto'] = $request->file('foto')->store('foto-pengalaman', 'public');
        }

        $pengalaman->update($data);

        return redirect()->route('admin.edit-pengalaman')->with('success', 'Pengalaman berhasil diperbarui!');
    }

    /**
     * Delete pengalaman.
     */
    public function destroyPengalaman(Pengalaman $pengalaman)
    {
        if ($pengalaman->foto) {
            \Storage::disk('public')->delete($pengalaman->foto);
        }

        $pengalaman->delete();

        return redirect()->route('admin.edit-pengalaman')->with('success', 'Pengalaman berhasil dihapus!');
    }

    /**
     * Halaman Edit Project.
     */
    public function editProject()
    {
        $projects = Project::orderBy('created_at', 'desc')->get();
        return view('admin.project.edit', compact('projects'));
    }

    /**
     * Store new project.
     */
    public function storeProject(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'link_github' => 'nullable|string|max:255',
            'link_demo' => 'nullable|string|max:255',
            'teknologi' => 'nullable|string',
        ]);

        $data = $request->only([
            'judul',
            'deskripsi',
            'link_github',
            'link_demo',
        ]);

        if ($request->filled('teknologi')) {
            $data['teknologi'] = array_map('trim', explode(',', $request->teknologi));
        }

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('gambar-project', 'public');
        }

        Project::create($data);

        return redirect()->route('admin.edit-project')->with('success', 'Project berhasil ditambahkan!');
    }

    /**
     * Update existing project.
     */
    public function updateProject(Request $request, Project $project)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'link_github' => 'nullable|string|max:255',
            'link_demo' => 'nullable|string|max:255',
            'teknologi' => 'nullable|string',
        ]);

        $data = $request->only([
            'judul',
            'deskripsi',
            'link_github',
            'link_demo',
        ]);

        if ($request->filled('teknologi')) {
            $data['teknologi'] = array_map('trim', explode(',', $request->teknologi));
        }

        if ($request->hasFile('gambar')) {
            if ($project->gambar) {
                \Storage::disk('public')->delete($project->gambar);
            }
            $data['gambar'] = $request->file('gambar')->store('gambar-project', 'public');
        }

        $project->update($data);

        return redirect()->route('admin.edit-project')->with('success', 'Project berhasil diperbarui!');
    }

    /**
     * Delete project.
     */
    public function destroyProject(Project $project)
    {
        if ($project->gambar) {
            \Storage::disk('public')->delete($project->gambar);
        }

        $project->delete();

        return redirect()->route('admin.edit-project')->with('success', 'Project berhasil dihapus!');
    }
}
