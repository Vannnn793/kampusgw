<?php

namespace App\Providers;

use App\Models\Faculty;
use App\Models\Profile;
use COM;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('*', function ($view) {
        // Untuk Navbar (Kategori Berita)
        $view->with('navCategories', \App\Models\Category::all());
        
        // Untuk Download (Kategori File)
        // Kita ambil list dari ENUM atau hardcode array supaya konsisten
        $view->with('fileCategories', ['akademik', 'kemahasiswaan', 'panduan', 'umum']);
    });

        View::share('categories', \App\Models\Category::withCount('posts')->get());
        // Navbar Fakultas
        View::share('faculties', Faculty::all());
        View::share('partners', \App\Models\Partner::all());
        View::share('posts', \App\Models\Post::latest()->take(6)->get());
        // Footer Top Programs
        View::share('prodis', \App\Models\Prodi::all());
        // Footer Resources & Downloads 
        View::share('downloads', \App\Models\Download::latest()->take(5)->get());


        // Footer Profile Kampus
        View::share('profile', Profile::first());
    }
}
