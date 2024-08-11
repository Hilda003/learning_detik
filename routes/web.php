<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\TopicController;
use App\Http\Controllers\AdminController;


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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::middleware(['auth'])->group(function () {
    // User can view topics
    Route::get('/topics', [TopicController::class, 'index'])->name('topics.index');

    Route::middleware(['admin'])->group(function () {
        Route::get('/admin-dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
        Route::get('/topics/create', [TopicController::class, 'create'])->name('topics.create');
        Route::post('/topics', [TopicController::class, 'store'])->name('topics.store');
        Route::get('/topics/{topic}/edit', [TopicController::class, 'edit'])->name('topics.edit');
        Route::put('/topics/{topic}', [TopicController::class, 'update'])->name('topics.update');
        Route::delete('/topics/{topic}', [TopicController::class, 'destroy'])->name('topics.destroy');
    });
});


Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::resource('topics', TopicController::class);
Route::get('/', function () {
    return redirect()->route('login');
});

