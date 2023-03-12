<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\authController;
use App\Http\Controllers\depanController;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\skillController;
use App\Http\Controllers\halamanController;
use App\Http\Controllers\profileController;
use App\Http\Controllers\educationController;
use App\Http\Controllers\experienceController;
use App\Http\Controllers\konfigurasiHalamanController;

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

//Route::get('/', function () {
//    return view('welcome');
//});


Route::get('/',[depanController::class, "index"]);

Route::redirect('home','dashboard');

Route::get('/auth',[authController::class,"index"]);

Route::get('/auth/redirect', [authController::class, "redirect"]);
Route::get('/auth/callback', [authController::class, "callback"]);
Route::get('/auth/logout',[authController::class,"logout"]);

Route::get('/dashboard',function() {
    return view('dashboard.index');
    #'Selamat Datang '.Auth::user()->email .' di dashboard';
})->middleware('auth');


Route::prefix('dashboard')->middleware('auth')->group(
    function () {
        Route::get('/', function(){
            return view('dashboard.layout');
        });
        Route::resource('halaman', halamanController::class);
        Route::resource('experience', experienceController::class);
        Route::resource('education', educationController::class);
        
        Route::get('skill', [skillController::class, "index"])->name('skill.index');
        Route::post('skill', [skillController::class, "update"])->name('skill.update');
        
        Route::get('profile', [profileController::class, "index"])->name('profile.index');
        Route::post('profile', [profileController::class, "update"])->name('profile.update');
        
        Route::get('konfigurasihalaman', [konfigurasiHalamanController::class, "index"])->name('konfigurasihalaman.index');
        Route::post('konfigurasihalaman', [konfigurasiHalamanController::class, "update"])->name('konfigurasihalaman.update');

        #Route::get('/', [halamanController::class, 'index']);
        #Route::get('halaman',[halamanController::class,'index']);
        #Route::resource('halaman', halamanController::class); done ✅
    }
);
?>