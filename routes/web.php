<?php

use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\ProfileController;
use App\Mail\ContactMailable;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\CheckDateController;
use App\Http\Controllers\Frontend\HomeController;

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

Route::get('/', [HomeController::class,'index'])->name('home');

Route::get('/dashboard', function () {
    return view('frontend/pages/dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/escuela', function () {
    return view('frontend/pages/academy');
})->name('academy');

Route::get('/instalaciones', function () {
    return view('frontend/pages/installations');
})->name('installations');

Route::post('/check_date', [CheckDateController::class, 'index'])->name('check_date');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');//muestra el formulario de contacto

Route::post('/contact', [ContactController::class, 'store'])->name('contact');
/*
Route::get('contactanos', function () {
    Mail::to('marpul3@hotmail.com')->send(new ContactMailable);// Para
    return "Mensaje enviado";
})->name('contactanos');
*/
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
