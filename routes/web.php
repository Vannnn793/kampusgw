<?php

use Illuminate\Support\Facades\Route;
use App\Models\Faculty;
use App\Models\Post;

/*
|--------------------------------------------------------------------------
| CONTROLLERS
|--------------------------------------------------------------------------
*/

// Public Controllers
use App\Http\Controllers\FacultyController;
use App\Http\Controllers\CareerController;
use App\Http\Controllers\AdmissionController;
use App\Http\Controllers\TentangController;
use App\Http\Controllers\FacilityController;
use App\Http\Controllers\lancingController;
// Admin Controllers
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\FacultyController as AdminFacultyController;
use App\Http\Controllers\Admin\ProdiController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\PartnerController;
use App\Http\Controllers\Admin\AlumniController as AdminAlumni;

use App\Models\PmbInfo;

Route::get('/pmb', function () {
    $pmbs = PmbInfo::where('is_active', 1)
        ->orderBy('start_date')
        ->get();

    return view('pmb.index', compact('pmbs'));
})->name('pmb.index');

Route::get('/pmb/{slug}', function ($slug) {
    $pmb = PmbInfo::where('slug', $slug)
        ->where('is_active', 1)
        ->firstOrFail();

    return view('pmb.show', compact('pmb'));
})->name('pmb.show');

Route::get(
    '/faculties/{faculty:slug}/prodi/{prodi:slug}',
    [ProdiController::class, 'show']
)->name('faculties.prodis.show');

/*
|--------------------------------------------------------------------------
| PUBLIC ROUTES
|--------------------------------------------------------------------------
*/
// JSON endpoint untuk landing page
Route::get('/posts/{post:slug}/json', function (Post $post) {
    return response()->json($post);
})->name('posts.json');

Route::get('/', function () {
    return view('landing', [
        'posts'      => Post::latest()->take(6)->get(),
        'faculties'  => Faculty::all(),
        'partners'   => \App\Models\Partner::all(),
        'categories' => \App\Models\Category::all(),
    ]);
})->name('home');
Route::get('/', [lancingController::class, 'index'])->name('landing');

// Careers
Route::get('/careers', [CareerController::class, 'index'])->name('careers');

// Admissions
Route::get('/admissions', [AdmissionController::class, 'index'])->name('admissions.index');
Route::post('/admissions', [AdmissionController::class, 'store'])->name('admissions.store');

// Fakultas (PUBLIC)
Route::get('/faculties', [FacultyController::class, 'index'])
    ->name('faculties.index');

Route::get('/faculties/{slug}', [FacultyController::class, 'show'])
    ->name('faculties.show');

// Prodi (PUBLIC)
Route::get('/faculties/{faculty}/prodis/{prodi}', [ProdiController::class, 'show'])
    ->name('faculties.prodis.show');

// Posts
Route::get('/posts/{post:slug}', function (Post $post) {
    return view('posts.show', compact('post'));
})->name('posts.show');

/*
|--------------------------------------------------------------------------
| TENTANG ROUTES
|--------------------------------------------------------------------------
*/
Route::prefix('tentang')->name('tentang.')->group(function () {

    Route::get('/', fn () => view('tentang.index'))->name('index');
    Route::get('/visi-misi', fn () => view('tentang.visi-misi'))->name('visi-misi');

    Route::get('/akreditasi', [TentangController::class, 'akreditasi'])->name('akreditasi');
    Route::get('/struktur', [TentangController::class, 'struktur'])->name('struktur');
    Route::get('/sejarah', [TentangController::class, 'sejarah'])->name('sejarah');

    // ✅ FASILITAS
    Route::get('/fasilitas', [FacilityController::class, 'index'])
        ->name('fasilitas.index');

    Route::get('/fasilitas/{faculty:slug}', [FacilityController::class, 'byFaculty'])
        ->name('fasilitas.faculty');
});
/*
|--------------------------------------------------------------------------
| ADMIN ROUTES
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    Route::prefix('admin')->name('admin.')->group(function () {

        Route::resource('faculties', AdminFacultyController::class);
        Route::resource('prodis', ProdiController::class);
        Route::resource('posts', PostController::class);
        Route::resource('partners', PartnerController::class);

        Route::resource('organization', \App\Http\Controllers\Admin\OrganizationStructureController::class);
        Route::resource('facilities', \App\Http\Controllers\Admin\FacilityController::class);
        Route::resource('accreditations', \App\Http\Controllers\Admin\AccreditationController::class);
        Route::resource('profiles', \App\Http\Controllers\Admin\ProfileController::class);
        Route::resource('sliders', \App\Http\Controllers\Admin\SliderController::class);
        Route::resource('download', \App\Http\Controllers\Admin\DownloadController::class);
        Route::resource('pmb-info', \App\Http\Controllers\Admin\PmbInfoController::class);

        // Admissions admin
        Route::get('/admissions', [AdmissionController::class, 'adminIndex'])
            ->name('admissions.index');

        Route::delete('/admissions/{id}', [AdmissionController::class, 'destroy'])
            ->name('admissions.destroy');

        // Alumni
        Route::get('/alumni', [AdminAlumni::class, 'index'])
            ->name('alumni.index');

        Route::post('/alumni/store', [AdminAlumni::class, 'store'])
            ->name('alumni.store');

        Route::get('/get-prodi/{faculty_id}', [AdminAlumni::class, 'getProdi']);
    });
});

require __DIR__.'/auth.php';
