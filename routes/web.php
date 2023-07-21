<?php

use App\Http\Controllers\PlantController;

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
	return Inertia::render('Welcome', [
		'canLogin' => Route::has('login'),
		'canRegister' => Route::has('register'),
		'laravelVersion' => Application::VERSION,
		'phpVersion' => PHP_VERSION,
	]);
});

Route::get('/dashboard', function () {
	return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::resource('plants', PlantController::class)
	// ->only(['index', 'store', 'create'])
	->middleware(['auth', 'verified']);



Route::inertia('/about', 'About')->name('about')->middleware(['auth', 'verified']);

Route::get('/calendar', function () {
	return Inertia::render('Calendar');
})->name('calendar')->middleware(['auth', 'verified']);


Route::middleware('auth')->group(function () {
	Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
	Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
	Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('phpmyinfo', function () {
	phpinfo();
})->name('phpmyinfo');

require __DIR__ . '/auth.php';
