<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PageController extends Controller
{
    public function index() {
        $pages = Page::all();
        return view('admin.pages.index', compact('pages'));
    }

    public function edit(Page $page) {
        return view('admin.pages.edit', compact('page'));
    }

    public function update(Request $request, Page $page) {
        $request->validate([
            'title' => 'required',
            'content' => 'required'
        ]);

        $page->update([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'content' => $request->content,
        ]);

        return redirect()->route('admin.pages.index')->with('success', 'Halaman berhasil diupdate!');
    }
}