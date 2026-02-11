<?php

use Illuminate\Support\Facades\Route;
use App\Models\Faculty;
use App\Models\Post;
use App\Models\Profile;

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
use App\Http\Controllers\ProdiController;

// Admin Controllers
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\FacultyController as AdminFacultyController;
use App\Http\Controllers\Admin\ProdiController as AdminProdiController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\PartnerController;
use App\Http\Controllers\Admin\AlumniController as AdminAlumni;
use App\Http\Controllers\Admin\BadgeController;
use App\Http\Controllers\Admin\DownloadController;

use App\Models\PmbInfo;

Route::get('/posts', [PostController::class, 'index']);
Route::get('/posts/{post:slug}', [PostController::class, 'show']);

Route::get('/pmb', function () {
    $pmbs = PmbInfo::where('is_active', 1)
        ->orderBy('start_date')
        ->get();

    return view('pmb.index', compact('pmbs'));
})->name('pmb.index');

Route::get('/posts', [PostController::class, 'show'])->name('posts.index');

Route::get('/pmb/{slug}', function ($slug) {
    $pmb = PmbInfo::where('slug', $slug)
        ->where('is_active', 1)
        ->firstOrFail();

    return view('pmb.show', compact('pmb'));
})->name('pmb.show');
Route::get('/pmb/{id}/download', function ($id) {
    $pmb = PmbInfo::findOrFail($id);

    if ($pmb->image && \Storage::disk('public')->exists($pmb->image)) {
        return \Storage::disk('public')->download($pmb->image);
    } else {
        return redirect()->back()->with('error', 'Brosur tidak ditemukan.');
    }
})->name('pmb-info.download');


Route::get('/tentang/sambutan', function () {
    $rektor = Profile::select(
        'nama_rektor',
        'foto_rektor',
        'sambutan_rektor',
        'logo_path'
    )->first();

    return view('tentang.sambutan', compact('rektor'));
})->name('sambutan.rektor');

Route::prefix('tentang')->name('tentang.')->group(function () {

    Route::get('/', fn () => view('tentang.index'))->name('index');
    Route::get('/visi-misi', fn () => view('tentang.visi-misi'))->name('visi-misi');
    Route::get('/akreditasi', [TentangController::class, 'akreditasi'])->name('akreditasi');
    Route::get('/struktur', [TentangController::class, 'struktur'])->name('struktur');
    Route::get('/sejarah', [TentangController::class, 'sejarah'])->name('sejarah');

    // Fasilitas
    Route::get('/fasilitas', [FacilityController::class, 'index'])->name('fasilitas.index');
    Route::get('/fasilitas/umum', [FacilityController::class, 'campus'])->name('fasilitas.umum');
    Route::get('/fasilitas/fakultas/{faculty:slug}', [FacilityController::class, 'byFaculty'])->name('fasilitas.faculty');
});

/*
|--------------------------------------------------------------------------
| PUBLIC ROUTES
|--------------------------------------------------------------------------
*/

// Landing Page
Route::get('/', [lancingController::class, 'index'])->name('landing');

// Careers
Route::get('/careers', [CareerController::class, 'index'])->name('careers');

// Admissions
Route::get('/admissions', [AdmissionController::class, 'index'])->name('admissions.index');
Route::post('/admissions', [AdmissionController::class, 'store'])->name('admissions.store');

Route::get('/downloads', [DownloadController::class, 'download'])->name('downloads.index');
Route::get('/download/{id}', [DownloadController::class, 'downloadFile'])->name('download.file');



// Posts JSON & detail
Route::get('/posts/{post:slug}/json', fn (Post $post) => response()->json($post))->name('posts.json');
Route::get('/posts/{post:slug}', fn (Post $post) => view('posts.show', compact('post')))->name('posts.show');

// Fakultas & Prodi PUBLIC
Route::prefix('faculties')->group(function () {

    // List Fakultas
    Route::get('/', [FacultyController::class, 'index'])->name('faculties.index');

    // Fakultas detail
    Route::get('{faculty:slug}', [FacultyController::class, 'show'])->name('faculties.show');


    // Prodi detail
    Route::get('{faculty:slug}/prodis/{prodi:slug}', [ProdiController::class, 'show'])->name('faculties.prodis.show');
});

/*
|--------------------------------------------------------------------------
| ADMIN ROUTES
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::prefix('admin')->name('admin.')->group(function () {

        // CRUD Admin
        Route::resource('faculties', AdminFacultyController::class);
        Route::resource('prodis', AdminProdiController::class);
        Route::resource('posts', PostController::class);
        Route::resource('partners', PartnerController::class);

        Route::resource('organization', \App\Http\Controllers\Admin\OrganizationStructureController::class);
        Route::resource('facilities', \App\Http\Controllers\Admin\FacilityController::class);
        Route::resource('accreditations', \App\Http\Controllers\Admin\AccreditationController::class);
        Route::resource('profiles', \App\Http\Controllers\Admin\ProfileController::class);
        Route::resource('sliders', \App\Http\Controllers\Admin\SliderController::class);
        Route::resource('download', \App\Http\Controllers\Admin\DownloadController::class);
        Route::resource('pmb-info', \App\Http\Controllers\Admin\PmbInfoController::class);
        Route::resource('badges', BadgeController::class);
        Route::patch('/badges/{badge}/toggle', [BadgeController::class, 'toggle'])->name('badges.toggle');
        Route::resource('taglines', \App\Http\Controllers\Admin\TaglineController::class);

        // Admissions admin
        Route::get('/admissions', [AdmissionController::class, 'adminIndex'])->name('admissions.index');
        Route::delete('/admissions/{id}', [AdmissionController::class, 'destroy'])->name('admissions.destroy');

        // Alumni
        Route::get('/alumni', [AdminAlumni::class, 'index'])->name('alumni.index');
        Route::post('/alumni/store', [AdminAlumni::class, 'store'])->name('alumni.store');
        Route::get('/get-prodi/{faculty_id}', [AdminAlumni::class, 'getProdi']);

        Route::get('guides', function() {
            $profile = \App\Models\Profile::first();
            return view('admin.guide.index', compact('profile'));
        });
    });
});

require __DIR__.'/auth.php';
