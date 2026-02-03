<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OrganizationStructure;
use Illuminate\Http\Request;
use App\Models\Faculty;

class OrganizationStructureController extends Controller
{
    public function index()
    {
        $structures = OrganizationStructure::orderBy('order')->get();
        $faculties = Faculty::all();
        return view('admin.organization.index', compact('structures', 'faculties'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'position' => 'required',
            'faculty_id' => 'nullable|exists:faculties,id',
            'photo' => 'image|nullable',
            'description' => 'nullable',
            'order' => 'nullable|integer'
        ]);

        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')
                                    ->store('organization','public');
        }

        OrganizationStructure::create($data);
        return back();
    }

    public function edit(OrganizationStructure $organizationStructure)
    {
        $faculties = Faculty::all();
        $organizationStructure = OrganizationStructure::findOrFail($organizationStructure->id);
        return view('admin.organization.edit', compact('organizationStructure', 'faculties'));
    }

    public function update(Request $request, OrganizationStructure $organizationStructure)
    {
        $data = $request->validate([
            'name' => 'required',
            'position' => 'required',
            'faculty_id' => 'nullable',
            'photo' => 'image|nullable',
            'description' => 'nullable',
            'order' => 'nullable|integer'
        ]);

        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')
                                    ->store('organization','public');
        }
        if ($request->position == 'pimpinan_univ') {
        $data['faculty_id'] = null;
    }

        $organizationStructure->update($data);
        return redirect()->route('admin.organization.index');
    }

    public function destroy($id)
{
    $org = OrganizationStructure::findOrFail($id);

    // Hapus file foto dari storage
    if ($org->photo && \Illuminate\Support\Facades\Storage::exists('public/' . $org->photo)) {
        \Illuminate\Support\Facades\Storage::delete('public/' . $org->photo);
    }

    $org->delete();

    return redirect()->route('admin.organization.index')->with('success', 'Data pejabat berhasil dihapus!');
}
    public function create()
    {
        $faculties = Faculty::all();
        return view('admin.organization.index', compact('faculties'));   
    }

    /**
     * Store a newly created resource in storage.
     */
    
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    
    /**
     * Update the specified resource in storage.
     */
    
    /**
     * Remove the specified resource from storage.
     */
    
}
