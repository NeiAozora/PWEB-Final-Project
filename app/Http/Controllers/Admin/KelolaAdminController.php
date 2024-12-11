<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pengguna;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class KelolaAdminController extends Controller
{
    public function index()
    {
        $admins = Pengguna::with('role')->whereHas('role', function($query) {
            $query->where('nama_role', 'Admin');
        })->get();

        return view('admin-pages.pages.kelola-admin', compact('admins'));
    }



    public function indexEditAdmin($id)
    {
        $admin = Pengguna::findOrFail($id);
        $roles = Role::all();
        return view('admin-pages.pages.buat-edit-admin', compact('admin', 'roles'));
    }

    public function indexCreateAdmin()
    {
        $roles = Role::all();
        return view('admin-pages.pages.buat-edit-admin', compact('roles'));
    }


    public function delete(Request $request, $id)
    {
        $admin = Pengguna::findOrFail($id);

        if ($admin->delete()) {
            echo "<script>
                    alert('Admin berhasil dihapus.');
                    window.location.href = '" . route('admin.manage') . "';
                  </script>";
            exit;
        }

        echo "<script>
                alert('Gagal menghapus admin.');
                window.history.back();
              </script>";
        exit;
    }


    // Store method for creating a new admin
    public function store(Request $request)
    {
        // Validate the incoming request
        $validated = $request->validate([
            'nama_depan' => 'required|string|max:255',
            'nama_belakang' => 'required|string|max:255',
            'email' => 'required|email|unique:pengguna,email|max:255',
            'username' => 'required|string|max:255|unique:pengguna,username',
            'password' => 'required|string|min:8', // confirm password confirmation field
            'id_role' => 'required|exists:role,id_role',
            'foto_profil' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Handle file upload if present
        if ($request->hasFile('foto_profil')) {
            $filePath = $request->file('foto_profil')->store('profile_pictures', 'public');
        } else {
            $filePath = null;
        }

        // Create the new admin record
        $admin = Pengguna::create([
            'nama_depan' => $validated['nama_depan'],
            'nama_belakang' => $validated['nama_belakang'],
            'email' => $validated['email'],
            'username' => $validated['username'],
            'password' => Hash::make($validated['password']),
            'id_role' => $validated['id_role'],
            'foto_profil' => $filePath,
        ]);

        // Redirect back with success message
        // JavaScript alert and redirect
        echo "<script>
                alert('Admin baru telah ditambahkan!');
                window.location.href = '" . route('admin.manage') . "';
              </script>";
        exit;    }

    public function update(Request $request, $id)
    {
        // Find the admin by ID
        $admin = Pengguna::findOrFail($id);

        // Validate the incoming request
        $validated = $request->validate([
            'nama_depan' => 'required|string|max:255',
            'nama_belakang' => 'required|string|max:255',
            'email' => ['required', 'email', Rule::unique('pengguna')->ignore($admin->id_pengguna, 'id_pengguna'), 'max:255'],
            'username' => ['required', 'string', 'max:255', Rule::unique('pengguna')->ignore($admin->id_pengguna, 'id_pengguna')],
            'id_role' => 'required|exists:role,id_role',
            'foto_profil' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Handle file upload if present
        if ($request->hasFile('foto_profil')) {
            // Delete old profile picture if it exists
            if ($admin->foto_profil) {
                $filePath = public_path('storage/' . $admin->foto_profil);

                if (file_exists($filePath)) {
                    unlink($filePath);
                }
            }
            $filePath = $request->file('foto_profil')->store('profile_pictures', 'public');
        } else {
            $filePath = $admin->foto_profil; // Keep the current profile picture if not uploading a new one
        }

        // Update the admin record
        $admin->update([
            'nama_depan' => $validated['nama_depan'],
            'nama_belakang' => $validated['nama_belakang'],
            'email' => $validated['email'],
            'username' => $validated['username'],
            'id_role' => $validated['id_role'],
            'foto_profil' => $filePath,
        ]);

        // JavaScript alert and redirect
        echo "<script>
                alert('Admin updated successfully!');
                window.location.href = '" . route('admin.manage') . "';
              </script>";
        exit;
    }

}
