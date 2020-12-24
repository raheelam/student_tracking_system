<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

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


Route::get('/add', function () {
    return view('add');
});


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->get('/generateqr', function () {
    return view('generateqr');
})->name('generateqr');

Route::middleware(['auth:sanctum', 'verified'])->get('/searchByroomDate', function () {
    return view('searchByroomDate');
})->name('searchByroomDate');

Route::middleware(['auth:sanctum', 'verified'])->get('/searchByDates', function () {
    return view('searchByDates');
})->name('searchByDates');

Route::middleware(['auth:sanctum', 'verified'])->get('/view_students_irbd', function () {
    return view('view_students_irbd');
})->name('view_students_irbd');

Route::post('students/getStudentsByroomDate', 'App\Http\Controllers\StudentController@getStudentsByroomDate')->name('getStudentsByroomDate');
//Route::resource('students', 'StudentController');
Route::post('students/getStudentsByDates', 'App\Http\Controllers\StudentController@getStudentsByDates')->name('getStudentsByDates');;
Route::resource('students', StudentController::class);

