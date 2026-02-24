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
        'tahun_beroperasi' => 'nullable|string|max:255',
        'total_prodi' => 'nullable|string|max:255',
        'total_alumni' => 'nullable|string|max:255',
        'total_dosen' => 'nullable|string|max:255',
        'gambar_kampus' => 'nullable|image|max:2048',
        'campus_name' => 'nullable|string|max:255',
        'gmaps_iframe' => 'nullable|string',
        'address' => 'nullable|string',
        'phone' => 'nullable|string|max:255',
        'email' => 'nullable|email|max:255',
        'mahasiswa_aktif' => 'nullable|integer|min:0',
        'tagline' => 'nullable|string|max:255',
        'facebook_url' => 'nullable|url|max:255',
        'instagram_url' => 'nullable|url|max:255',
        'youtube_url' => 'nullable|url|max:255',
        'twitter_url' => 'nullable|url|max:255',
        'tiktok_url' => 'nullable|url|max:255',
    ]);

    $profil = Profile::first(); // Asumsi ID selalu 1

    // Update Text Biasa
    $profil->nama_rektor     = $request->nama_rektor;
    $profil->sambutan_rektor = $request->sambutan_rektor;
    $profil->sejarah_kampus  = $request->sejarah_kampus;
    $profil->visi            = $request->visi;
    $profil->misi            = $request->misi;
    $profil->link_video_profil = $request->link_video_profil;
    $profil->tahun_beroperasi = $request->tahun_beroperasi;
    $profil->total_prodi     = $request->total_prodi;
    $profil->total_alumni    = $request->total_alumni;
    $profil->total_dosen     = $request->total_dosen;
    $profil->mahasiswa_aktif = $request->mahasiswa_aktif;
    // $profil->gambar_kampus   = $request->gambar_kampus;
    $profil->campus_name     = $request->campus_name;
    $profil->tagline         = $request->tagline;
    $profil->gmaps_iframe    = $request->gmaps_iframe;
    $profil->address         = $request->address;
    $profil->phone           = $request->phone;
    $profil->email           = $request->email;
    $profil->facebook_url    = $request->facebook_url;
    $profil->instagram_url   = $request->instagram_url;
    $profil->youtube_url     = $request->youtube_url;
    $profil->twitter_url     = $request->twitter_url;
    $profil->tiktok_url      = $request->tiktok_url;
    $profil->whatsapp_url     = $request->whatsapp_url;
    
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

    //handle Upload Gambar Kampus
    if ($request->hasFile('gambar_kampus')) {
        // Hapus gambar lama
        if ($profil->gambar_kampus && Storage::exists('public/' . $profil->gambar_kampus)) {
            Storage::delete('public/' . $profil->gambar_kampus);
        }
        // Simpan gambar baru
        $path = $request->file('gambar_kampus')->store('kampus', 'public');
        $profil->gambar_kampus = $path;
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
