<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class PartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.partners.index', [
            'mitras' => Partner::latest()->get()
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'logo' => 'image|nullable'
        ]);

        if ($request->hasFile('logo')) {
            $data['logo'] = $request->file('logo')->store('mitras','public');
        }

        Partner::create($data);
        return back();
    } 
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    
    /**
     * Display the specified resource.
     */
    public function show(Partner $partner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $partner = Partner::findOrFail($id);
        return view('admin.partners.edit', compact('partner'));
    }

    public function update(Request $request, $id)
    {
        $partner = Partner::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,svg|max:2048', // Nullable karena user mungkin tidak ganti logo
        ]);

        // Cek apakah user mengupload logo baru
        if ($request->hasFile('logo')) {
            
            // 1. Hapus logo lama jika ada file-nya
            if ($partner->logo && Storage::exists('public/' . $partner->logo)) {
                Storage::delete('public/' . $partner->logo);
            }

            // 2. Upload logo baru
            $validated['logo'] = $request->file('logo')->store('partners', 'public');
        }

        $partner->update($validated);

        return redirect()->route('admin.partners.index')->with('success', 'Data mitra berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $partner = Partner::findOrFail($id);

        // Hapus file fisik logo dari storage sebelum hapus data di DB
        if ($partner->logo && Storage::exists('public/' . $partner->logo)) {
            Storage::delete('public/' . $partner->logo);
        }

        $partner->delete();

        return redirect()->route('admin.partners.index')->with('success', 'Mitra berhasil dihapus!');
    }
    }
