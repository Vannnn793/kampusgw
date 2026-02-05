<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Badge;

class BadgeController extends Controller
{
    public function index()
    {
        $badges = Badge::all();
        return view('admin.badges.index', compact('badges'));
    }

    // Simpan slogan baru
    public function store(Request $request)
    {
        $request->validate(['name' => 'required|string|max:50']);
        Badge::create(['name' => $request->name]);
        return back()->with('success', 'Gelar/Slogan baru berhasil ditambah!');
    }

    // Update status tampil/tidak (Ajax atau Form biasa)
    public function toggle(Badge $badge)
    {
        $badge->update(['is_active' => !$badge->is_active]);
        return back()->with('success', 'Status tampilan berhasil diubah!');
    }

    // Hapus slogan
    public function destroy(Badge $badge)
    {
        $badge->delete();
        return back()->with('success', 'Gelar berhasil dihapus!');
    }
}
