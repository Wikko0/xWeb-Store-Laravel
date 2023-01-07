<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminLogin;
use App\Http\Controllers\PaymentController;
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
    return view('welcome');
});

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('Home');
Route::get('/account', [AccountController::class, 'index'])->name('Account');
Route::get('/contact', [ContactController::class, 'index'])->name('Contact');
Route::post('/contact', [ContactController::class, 'contact']);
Route::get('/about', [AboutController::class, 'index'])->name('About Us');


//Payments
Route::get('/payment', [PaymentController::class, 'index'])->name('Payment');
Route::post('/charge', [PaymentController::class, 'charge']);
Route::get('/success', [PaymentController::class, 'success'])->name('Success Payment');
Route::get('/error', [PaymentController::class, 'error'])->name('Error');


// Admin Panel
Route::get('/adminlogin', [AdminLogin::class, 'login'])->name('Admin Login');
Route::post('/adminlogin', [AdminLogin::class, 'do_login']);
Route::get('/adminpanel', [AdminController::class, 'index'])->name('Admin Panel');
Route::get('/settings', [AdminController::class, 'settings'])->name('Settings');
Route::post('/settings', [AdminController::class, 'do_settings'])->name('Settings');
Route::get('/team', [AdminController::class, 'team'])->name('Team');
Route::post('/team', [AdminController::class, 'do_team']);
Route::delete('/team', [AdminController::class, 'delete_team']);
Route::get('/addinfo', [AdminController::class, 'addinfo'])->name('Add Information');
Route::post('/addinfo', [AdminController::class, 'do_addinfo']);
Route::get('/addmedia', [AdminController::class, 'media'])->name('Add Media');
Route::post('/addmedia', [AdminController::class, 'do_media']);
Route::delete('/addmedia', [AdminController::class, 'delete_media']);
Route::get('/inbox', [AdminController::class, 'inbox'])->name('Mail Inbox');
Route::get('/mail/{mail}', [AdminController::class, 'mail'])->name('Mail Read');
