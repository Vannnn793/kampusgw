<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Download;
use Illuminate\Support\Facades\Storage; // Wajib import ini buat hapus file
use App\Http\Controllers\Controller;

class DownloadController extends Controller
{
    public function index()
    {
        $downloads = Download::latest()->get();
        return view('admin.download.index', compact('downloads'));
    }

    public function create()
    {
        return view('admin.download.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required',
            // Validasi file: Wajib, maks 10MB, format dokumen
            'file' => 'required|file|mimes:pdf,doc,docx,xls,xlsx|max:10240',
        ]);

        // 1. Upload File
        if ($request->hasFile('file')) {
            // File akan disimpan di folder: storage/app/public/documents
            $filePath = $request->file('file')->store('documents', 'public');
        }

        // 2. Simpan ke Database
        Download::create([
            'title' => $request->title,
            'category' => $request->category,
            'description' => $request->description,
            'file_path' => $filePath // Simpan path-nya saja
        ]);

        return redirect()->route('admin.download.index')->with('success', 'Dokumen berhasil diupload!');
    }

    public function edit($id)
    {
        $download = Download::findOrFail($id);
        return view('admin.download.edit', compact('download'));
    }

    public function update(Request $request, $id)
    {
        $download = Download::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            // File jadi nullable (opsional) saat update
            'file' => 'nullable|file|mimes:pdf,doc,docx,xls,xlsx|max:10240',
        ]);

        $data = $request->except(['file']);

        // LOGIC GANTI FILE
        if ($request->hasFile('file')) {
            // 1. Hapus file lama dulu biar server gak penuh
            if ($download->file_path && Storage::exists('public/' . $download->file_path)) {
                Storage::delete('public/' . $download->file_path);
            }
            
            // 2. Upload file baru
            $data['file_path'] = $request->file('file')->store('documents', 'public');
        }

        $download->update($data);

        return redirect()->route('admin.download.index')->with('success', 'Dokumen berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $download = Download::findOrFail($id);

        // Hapus file fisiknya juga
        if ($download->file_path && Storage::exists('public/' . $download->file_path)) {
            Storage::delete('public/' . $download->file_path);
        }

        $download->delete();

        return redirect()->route('admin.download.index')->with('success', 'Dokumen dihapus permanen.');
    }
    public function downloadFile($id)
    {
        $download = Download::findOrFail($id);

        if ($download->file_path && Storage::exists('public/' . $download->file_path)) {
            return Storage::download('public/' . $download->file_path, $download->title . '.' . pathinfo($download->file_path, PATHINFO_EXTENSION));
        }

        return redirect()->back()->with('error', 'File tidak ditemukan.');
    }
    public function download(Request $request)
    {
        $query = Download::query();

        // 2. Filter berdasarkan kategori (jika user klik kategori di sidebar/tab)
        if ($request->has('category') && $request->category != 'all') {
            $query->where('category', $request->category);
        }

        // 3. Fitur Search (jika lu mau tambahin input search di view)
        if ($request->has('search')) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }

        // 4. Ambil data dengan pagination agar halaman tidak terlalu berat
        $downloads = $query->latest()->paginate(9);

        // 5. Ambil daftar kategori unik untuk ditampilkan di sidebar/filter tab
        $categories = ['akademik', 'kemahasiswaan', 'panduan', 'umum'];

        return view('downloads.index', compact('downloads', 'categories'));
    }

    /**
     * Opsional: Fitur hitung jumlah download (Counter)
     */
}
