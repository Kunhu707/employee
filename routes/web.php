<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EmployerController;
use App\Http\Controllers\Auth\LoginController;

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
    // return view('welcome');
    return redirect('/employees');
});
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/employees', [EmployerController::class, 'employees'])->name('employees');
Route::get('/add-employee', [EmployerController::class, 'add'])->name('add-employee');
Route::get('/edit-employee/{id}', [EmployerController::class, 'edit'])->name('employees.edit-employee');
Route::post('/create-employee', 'EmployerController@create')->name('create-employee');
Route::get('/delete-employee/{id}', [EmployerController::class, 'delete']);

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/{any}', function() {
    return view('welcome');
})->where('any', '.*');
