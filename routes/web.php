<?php

use App\Http\Controllers\backend\AboutControler;
use App\Http\Controllers\backend\PostController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Simple Users Routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/showpost/{slug}', [HomeController::class, 'show'])->name('home.show');

Route::get('/about', function () {
    return view('frontend.about.index');
})->name('about');

Route::get('/samplepost', function () {
    return view('frontend.samplepost');
})->name('samplepost');

Route::get('/post/search', [PostController::class, 'search'])->name('posts.search');




//Admin Users
Route::middleware('auth')->group(function () {
    Route::resource('post', PostController::class);
    Route::get("trash", [PostController::class, 'trash'])->name('post.trash');
    Route::delete('force-delete/{id}', [PostController::class, 'delete'])->name('post.force-delete');
    Route::get('restore/{id}', [PostController::class, 'restore'])->name('post.restore');

    //for dashboard view
    Route::get('/dashboard', [UserController::class, 'index'])->name('dashboard');
    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');
});

//Admin About Route
Route::get('admin/about', [AboutControler::class, 'index']);


Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});


// Route::get('/dashboard', function () {
//     return view('backend.dashboard.index');
// })->middleware(['auth', 'verified'])->name('dashboard');




Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
