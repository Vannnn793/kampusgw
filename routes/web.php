<?php
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\FacultyController;
use App\Http\Controllers\Admin\ProdiController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PostController;
use App\Models\Faculty;
use App\Models\Post;
use App\Http\Controllers\AdmissionController;
use App\Http\Controllers\Admin\PartnerController;

Route::get('/', function () {
    return view('landing');
});
Route::get('/posts/{post:slug}', function ($slug) {
    return \App\Models\Post::where('slug',$slug)->firstOrFail();
});

Route::get('/careers', fn() => view('careers.index'));
Route::get('/faculties', function () {
    $faculties = Faculty::all();
    return view('faculties.index', compact('faculties'));
});

Route::get('/admissions', [AdmissionController::class, 'index']);
Route::post('/admissions', [AdmissionController::class, 'store']);

Route::get('/', function () {
    $posts = Post::latest()->take(6)->get();
    $faculties = Faculty::all();
    $partners = \App\Models\Partner::all();
    return view('landing', compact('posts','faculties', 'partners'));
});

Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::prefix('admin')->name('admin.')->group(function () {

        Route::resource('faculties', FacultyController::class);
        Route::resource('prodis', ProdiController::class);
        Route::resource('posts', PostController::class);
        Route::resource('partners', PartnerController::class);
       
    });

});

require __DIR__.'/auth.php';
