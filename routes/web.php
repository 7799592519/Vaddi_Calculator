<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\InterestRecordController; // మీ కంట్రోలర్ ఇక్కడ యాడ్ చేశాం
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

// Home page
Route::get('/', function () {
    return view('welcome');
});

// Legal Pages (లాగిన్ అవ్వకపోయినా ఎవరికైనా కనిపించాలి కాబట్టి బయట పెట్టాం)
Route::view('/about-us', 'about');
Route::view('/privacy-policy', 'privacy');
Route::view('/contact-us', 'contact');

// Dashboard (Breeze default)
Route::get('/dashboard', function () {
    return redirect()->route('interest.index'); // డైరెక్ట్ గా వడ్డీ పేజీకి వెళ్లేలా మార్చాం
})->middleware(['auth', 'verified'])->name('dashboard');

// Auth Middleware: లాగిన్ అయిన వారికి మాత్రమే యాక్సెస్ ఉండే రౌట్స్ ఇవి
Route::middleware('auth')->group(function () {

    // Mee Interest Calculator routes
    Route::get('/interest', [InterestRecordController::class, 'index'])->name('interest.index');
    Route::get('/interest/create', [InterestRecordController::class, 'create'])->name('interest.create'); // <-- Idi kothaga add chesam
    Route::post('/interest', [InterestRecordController::class, 'store'])->name('interest.store');

    // Profile Routes (Breeze default)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('/admin/users', [AdminController::class, 'users'])->name('admin.users');

require __DIR__.'/auth.php';
