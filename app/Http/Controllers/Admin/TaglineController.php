<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tagline;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TaglineController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $taglines = Tagline::latest()->get();
        return view('admin.tagline.index', compact('taglines'));
    }

    public function create()
    {
        return view('admin.tagline.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'icon' => 'required|string|max:50', // cth: bi bi-wifi
        ]);

        Tagline::create($request->all());

        return redirect()->route('admin.taglines.index')->with('success', 'Tagline berhasil ditambahkan!');
    }

    public function edit(Tagline $tagline)
    {
        return view('admin.tagline.edit', compact('tagline'));
    }

    public function update(Request $request, Tagline $tagline)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'icon' => 'required|string|max:50',
        ]);

        $tagline->update($request->all());

        return redirect()->route('admin.taglines.index')->with('success', 'Tagline berhasil diperbarui!');
    }

    public function destroy(Tagline $tagline)
    {
        $tagline->delete();
        return redirect()->route('admin.taglines.index')->with('success', 'Tagline dihapus!');
    }
}
