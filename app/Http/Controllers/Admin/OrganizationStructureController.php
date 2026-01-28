<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OrganizationStructure;
use Illuminate\Http\Request;

class OrganizationStructureController extends Controller
{
    public function index()
    {
        $structures = OrganizationStructure::orderBy('order')->get();
        return view('admin.organization.index', compact('structures'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'position' => 'required',
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
        return view('admin.organization.edit', compact('organizationStructure'));
    }

    public function update(Request $request, OrganizationStructure $organizationStructure)
    {
        $data = $request->validate([
            'name' => 'required',
            'position' => 'required',
            'photo' => 'image|nullable',
            'description' => 'nullable',
            'order' => 'nullable|integer'
        ]);

        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')
                                    ->store('organization','public');
        }

        $organizationStructure->update($data);
        return redirect()->route('admin.organization.index');
    }

    public function destroy(OrganizationStructure $organizationStructure)
    {
        $organizationStructure->delete();
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
