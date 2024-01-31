<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\OrganizationRegistrationTokenController;
use App\Http\Controllers\RegistrationTokenController;
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

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// Routes for which ziggy does not generate the model binding
Route::prefix('via_resource/')->name('via_resource.')->group(function() {
    Route::resource('organizations.registrationTokens', OrganizationRegistrationTokenController::class)
        ->only(['index', 'create', 'store', 'show', 'destroy'])
        ->middleware(['verified']);

    Route::resource('registrationTokens', RegistrationTokenController::class)
        ->only(['index', 'create', 'store', 'show', 'destroy'])
        ->middleware(['verified']);
});


// One way to work around it, but not preferred
Route::middleware(['verified'])->prefix('via_url/')->name('via_url.')->group(function () {
    Route::get('/organizations/{organization:slug}/registration_tokens/{registration_token:token}', [RegistrationTokenController::class, 'show'])->name('organizations.registration_tokens.show');
    Route::get('/registration_tokens/{registration_token:token}', [RegistrationTokenController::class, 'show'])->name('registration_tokens.show');
});

require __DIR__.'/auth.php';
