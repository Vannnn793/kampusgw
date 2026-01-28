<?php

namespace App\Http\Controllers\Admin;

use App\Models\Accreditation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Prodi;
class AccreditationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $accreditations = Accreditation::latest()->get();
        return view('admin.accreditations.index', compact('accreditations'));
    }

    public function create()
    {
        return view('admin.accreditation.create',[
            'prodi'   => Prodi::all(),
        ]);
    }

    public function store(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'program_name' => 'required|string|max:255',
            'level' => 'required|string|max:50',
            'issued_by' => 'nullable|string|max:255',
            'certificate_number' => 'nullable|string|max:255',
            'valid_until' => 'nullable|date', // Pastikan format tanggal
        ]);

        Accreditation::create($validatedData);

        return redirect()->back()
            ->with('success', 'Data akreditasi berhasil ditambahkan!');
    }

    public function edit(string $id)
    {
        $accreditation = Accreditation::findOrFail($id);
        return view('admin.accreditation.edit', compact('accreditation'));
    }

    public function update(Request $request, string $id)
    {
        $accreditation = Accreditation::findOrFail($id);

        $validatedData = $request->validate([
            'program_name' => 'required|string|max:255',
            'level' => 'required|string|max:50',
            'issued_by' => 'nullable|string|max:255',
            'certificate_number' => 'nullable|string|max:255',
            'valid_until' => 'nullable|date',
        ]);

        $accreditation->update($validatedData);

        return redirect()->route('admin.accreditation.edit')
            ->with('success', 'Data akreditasi berhasil diperbarui!');
    }

    public function destroy(string $id)
    {
        $accreditation = Accreditation::findOrFail($id);
        $accreditation->delete();

        return redirect()->route('dashboard')
            ->with('success', 'Data akreditasi berhasil dihapus!');
    }
    /**
     * Display the specified resource.
     */
    public function show(Accreditation $accreditation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
}
