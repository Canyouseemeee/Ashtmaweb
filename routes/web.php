<?php

use Illuminate\Support\Facades\Route;

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
    return view('auth.login');
});

Auth::routes();


Route::post('/login-medic', [App\Http\Controllers\Auth\LoginController::class, 'login']);
Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout']);


Route::group(['middleware' => ['verify.admin']], function(){
    // Route::post('/login-medic', [App\Http\Controllers\Auth\LoginController::class, 'login']);
    Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index']);

    Route::get('/usermanagement', [App\Http\Controllers\Admin\UsermgController::class, 'index']);
    Route::get('/add_usermanagement', [App\Http\Controllers\Admin\UsermgController::class, 'adduser']);
    Route::post('/add_user', [App\Http\Controllers\Admin\UsermgController::class, 'add_user']);
    Route::get('/edit_usermanagement/{id?}', [App\Http\Controllers\Admin\UsermgController::class, 'edituser']);
    Route::post('/update_user/{id}', [App\Http\Controllers\Admin\UsermgController::class, 'update_user']);


});
Route::middleware(['guest'])->group(function () {
    // routes that require user to be authenticated
    Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index']);

    Route::get('/patient', [App\Http\Controllers\Users\PatientController::class, 'index']);
    Route::get('/addpatient', [App\Http\Controllers\Users\PatientController::class, 'addpatient']);
    Route::post('/add_patient', [App\Http\Controllers\Users\PatientController::class, 'add_patient']);




});
// Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index']);

