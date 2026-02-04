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
        View::share('categories', \App\Models\Category::withCount('posts')->get());
        // Navbar Fakultas
        View::share('faculties', Faculty::all());


        // Footer Profile Kampus
        View::share('profile', Profile::first());
    }
}
