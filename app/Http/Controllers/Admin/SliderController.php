<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    public function index()
    {
        // Ambil data untuk ditampilkan di tabel
        $posts = Post::latest()->get(['id', 'title', 'thumbnail', 'is_slider', 'slider_title']);
        return view('admin.sliders.index', compact('posts'));
    }

    public function update(Request $request)
    {
        // $request->sliders akan berisi array data dari form
        // Formatnya: [ ID_BERITA => [ 'active' => 'on', 'title' => 'Judul Baru' ] ]
        
        $inputs = $request->input('sliders', []);

        // Kita loop semua input yang masuk
        foreach ($inputs as $id => $data) {
            $post = Post::find($id);
            
            if ($post) {
                // Cek apakah dicentang? (isset)
                $isActive = isset($data['active']); 
                
                // Ambil judul custom, kalau kosong pakai judul asli berita
                $customTitle = $data['title'] ? $data['title'] : null;

                $post->update([
                    'is_slider'    => $isActive,
                    'slider_title' => $isActive ? $customTitle : null 
                    // Kalau gak aktif, hapus aja judul slidernya biar bersih
                ]);
            }
        }

        return redirect()->back()->with('success', 'Slider berhasil diperbarui!');
    }
}