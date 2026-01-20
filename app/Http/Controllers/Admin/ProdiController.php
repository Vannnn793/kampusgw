<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Prodi;
use App\Models\Faculty;
use Illuminate\Http\Request;

class ProdiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.prodis.index', [
            'prodis' => Prodi::with('faculty')->get(),
            'faculties' => Faculty::all()
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'faculty_id' => 'required',
            'name' => 'required'
        ]);

        Prodi::create($request->all());

        return back()->with('success','Prodi added');
    }
    /**
     * Show the form for creating a new resource.
     */
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
    public function show(Prodi $prodi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Prodi $prodi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Prodi $prodi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Prodi $prodi)
    {
        //
    }
}
