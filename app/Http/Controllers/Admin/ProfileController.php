<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Http\Controllers\Controller;
use App\Models\Profile;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    Public function index(): View
    {
        $profile = Profile::find(1); // Asumsi hanya ada satu profil kampus

        return view('admin.profile.index', compact('profile'));
    }
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(Request $request)
{
    // Validasi
    $request->validate([
        'nama_rektor' => 'nullable|string|max:255',
        'foto_rektor' => 'nullable|image|max:2048', // Max 2MB
        'sambutan_rektor' => 'nullable|string',
        'sejarah_kampus' => 'nullable|string',
        'visi' => 'nullable|string',
        'misi' => 'nullable|string',
        'link_video_profil' => 'nullable|url',
        'logo_path' => 'nullable|image|max:2048',
    ]);

    $profil = Profile::first(); // Asumsi ID selalu 1

    // Update Text Biasa
    $profil->nama_rektor     = $request->nama_rektor;
    $profil->sambutan_rektor = $request->sambutan_rektor;
    $profil->sejarah_kampus  = $request->sejarah_kampus;
    $profil->visi            = $request->visi;
    $profil->misi            = $request->misi;
    $profil->link_video_profil = $request->link_video_profil;
    
    // Handle Upload Logo Kampus
    if ($request->hasFile('logo_path')) {
        // Hapus logo lama
        if ($profil->logo_path && Storage::exists('public/' . $profil->logo_path)) {
            Storage::delete('public/' . $profil->logo_path);
        }
        // Simpan logo baru
        $path = $request->file('logo_path')->store('logo', 'public');
        $profil->logo_path = $path;
    }

    // Handle Upload Foto Rektor
    if ($request->hasFile('foto_rektor')) {
        // Hapus foto lama
        if ($profil->foto_rektor && Storage::exists('public/' . $profil->foto_rektor)) {
            Storage::delete('public/' . $profil->foto_rektor);
        }
        // Simpan foto baru
        $path = $request->file('foto_rektor')->store('rektor', 'public');
        $profil->foto_rektor = $path;
    }

    $profil->save();

    return redirect()->back()->with('success', 'Konten Profil berhasil diperbarui!');
}

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
