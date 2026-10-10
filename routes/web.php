<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InterestRecordController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function(){
    return redirect()->route('interest.index');

});
Route::resource('interest', InterestRecordController::class);
Route::view('/about-us', 'about');
Route::view('/privacy-policy', 'privacy');
Route::view('/contact-us', 'contact');
