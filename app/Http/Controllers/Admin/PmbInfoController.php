<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PmbInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Str; // Import ini buat bikin slug
use Illuminate\Support\Facades\Storage;

class PmbInfoController extends Controller
{
    public function index()
    {
        $pmbInfos = PmbInfo::latest()->get();
        return view('admin.pmb.index', compact('pmbInfos'));
    }

    public function create()
    {
        return view('admin.pmb.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|max:2048', // Maks 2MB
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date',
        ]);

        $data = $request->all();

        // 1. Generate Slug Otomatis (Contoh: "Gelombang 1" -> "gelombang-1")
        $data['slug'] = Str::slug($request->title);

        // 2. Handle Checkbox Active
        // Kalau checkbox dicentang dia ngirim value, kalau enggak dia null.
        // Kita paksa jadi boolean true/false.
        $data['is_active'] = $request->has('is_active') ? true : false;

        // 3. Upload Gambar Brosur
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('pmb-posters', 'public');
        }

        PmbInfo::create($data);

        return redirect()->route('admin.pmb-info.index')->with('success', 'Jalur masuk berhasil dibuat!');
    }

    public function edit($id)
    {
        $pmbInfo = PmbInfo::findOrFail($id);
        return view('admin.pmb.create', compact('pmbInfo'));
    }

    public function update(Request $request, $id)
    {
        $pmbInfo = PmbInfo::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|max:2048',
        ]);

        $data = $request->all();
        
        // Update slug kalau judul berubah
        if ($request->title != $pmbInfo->title) {
            $data['slug'] = Str::slug($request->title);
        }

        // Handle Checkbox saat update
        // Trik: $request->has('is_active') akan true kalau dicentang, false kalau tidak
        $data['is_active'] = $request->has('is_active'); 

        // Logic Ganti Gambar
        if ($request->hasFile('image')) {
            if ($pmbInfo->image && Storage::exists('public/' . $pmbInfo->image)) {
                Storage::delete('public/' . $pmbInfo->image);
            }
            $data['image'] = $request->file('image')->store('pmb-posters', 'public');
        }

        $pmbInfo->update($data);

        return redirect()->route('admin.pmb-info.index')->with('success', 'Info PMB diperbarui!');
    }

    public function destroy($id)
    {
        $pmbInfo = PmbInfo::findOrFail($id);

        // Hapus gambarnya
        if ($pmbInfo->image && Storage::exists('public/' . $pmbInfo->image)) {
            Storage::delete('public/' . $pmbInfo->image);
        }

        $pmbInfo->delete();

        return redirect()->route('admin.pmb-info.index')->with('success', 'Jalur masuk dihapus.');
    }  
}