<?php
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RapportController;
use App\Http\Controllers\EntrepriseController;
use App\Http\Controllers\ProfileController;
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





Route::get('/', function () {
    return view('auth/login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/accueil', function () {
    return view('accueil');
})->name('accueil');

Route::get('/entreprise', [EntrepriseController::class, 'show'])->name('entreprise');
Route::post('/entreprise', [EntrepriseController::class, 'store'])->name('entreprise.store');
Route::get('/entreprises', [EntrepriseController::class, 'index'])->name('entreprise.index');
Route::get('/entreprise/create', [EntrepriseController::class, 'create'])->name('entreprise.create');
Route::delete('/entreprise/{id}', [EntrepriseController::class, 'destroy'])->name('entreprise.destroy');



Route::get('/entreprise/{id}/edit', [EntrepriseController::class, 'edit'])->name('entreprise.edit');
Route::put('/entreprise/{id}', [EntrepriseController::class, 'update'])->name('entreprise.update');

Route::get('/rapport', [RapportController::class, 'rapport'])->name('rapport.index');



Route::get('/rapport-page', function () {
    return view('rapport');
})->name('rapport.page');


//----------------------Routes Admin------------------------------------

Route::get('/admin/users', [AdminController::class, 'users'])->name('admin.users');
Route::get('/admin/users/delete/{user}', [AdminController::class, 'delete'])->name('admin.users.delete');
Route::get('/admin/users/approve/{user}', [AdminController::class, 'approve'])->name('admin.users.approve');
Route::get('/admin/users/make-admin/{user}', [AdminController::class, 'makeAdmin'])->name('admin.users.make-admin');

