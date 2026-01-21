<?php
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\FacultyController;
use App\Http\Controllers\Admin\ProdiController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PostController;
use App\Models\Faculty;
use App\Models\Post;


Route::get('/', function () {
    return view('landing');
});
Route::get('/posts/{post:slug}', function (\App\Models\Post $post) {
    return response()->json($post);
});


Route::get('/', function () {
    $posts = Post::latest()->take(6)->get();
    $faculties = Faculty::all();
    return view('landing', compact('posts','faculties'));
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

    });

});

require __DIR__.'/auth.php';
