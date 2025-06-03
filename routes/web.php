<?php

use App\Http\Controllers\MatakuliahController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');



//menampilan daftar matkul
Route::get('/dashboard', [MatakuliahController::class, 'listMatkul'])->middleware(['auth', 'verified'])->name('dashboard');


//ttampialn form tambah data
Route::get('/formTambah', function() {
    return view('TambahMatkul');
} )->middleware(['auth', 'role:admin,owner']);;

//proses nambah matkul
Route::post('/tambahMatkul', [MatakuliahController::class, 'addMatkul'])->middleware(['auth', 'role:admin,owner']);

//tampilan 1 dara untuk update
Route::get('/formData/{id}', [MatakuliahController::class, 'showUpdate'])->middleware(['auth', 'role:admin,owner']);

//proses update
Route::put('/prosesUpdate/{id}', [MatakuliahController::class, 'updateProses'])->middleware(['auth', 'role:admin,owner']);

//proses delete
Route::delete('/delete/{id}', [MatakuliahController::class, 'deleteMatkul'])->middleware(['auth', 'role:admin,owner']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
