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
    if (Auth::check()) {
        return redirect('dashboard');
    }else{
        return view('auth.login');
    }
});

Auth::routes();


Route::post('/login-medic', [App\Http\Controllers\Auth\LoginController::class, 'login']);
Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout']);


Route::group(['middleware' => ['auth' ,'verify.admin:1']], function(){
    // Route::post('/login-medic', [App\Http\Controllers\Auth\LoginController::class, 'login']);
    Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index']);

    Route::get('/usermanagement', [App\Http\Controllers\Admin\UsermgController::class, 'index']);
    Route::get('/add_usermanagement', [App\Http\Controllers\Admin\UsermgController::class, 'adduser']);
    Route::post('/add_user', [App\Http\Controllers\Admin\UsermgController::class, 'add_user']);
    Route::get('/edit_usermanagement/{id?}', [App\Http\Controllers\Admin\UsermgController::class, 'edituser']);
    Route::post('/update_user/{id}', [App\Http\Controllers\Admin\UsermgController::class, 'update_user']);

    Route::get('/hospital', [App\Http\Controllers\Admin\HospitalController::class, 'index']);
    Route::post('/add_hospital', [App\Http\Controllers\Admin\HospitalController::class, 'add_hospital']);
    Route::get('/findh_id/{id}', [App\Http\Controllers\Admin\HospitalController::class, 'findhid']);
    Route::post('/edit_hospital', [App\Http\Controllers\Admin\HospitalController::class, 'edit_hospital']);

    Route::get('/disease', [App\Http\Controllers\Admin\DiseaseController::class, 'index']);
    Route::post('/add_disease', [App\Http\Controllers\Admin\DiseaseController::class, 'add_disease']);
    Route::get('/findd_id/{id}', [App\Http\Controllers\Admin\DiseaseController::class, 'finddid']);
    Route::post('/edit_disease', [App\Http\Controllers\Admin\DiseaseController::class, 'edit_disease']);

    Route::get('/medicine', [App\Http\Controllers\Admin\MedicineController::class, 'index']);
    Route::post('/add_medicine', [App\Http\Controllers\Admin\MedicineController::class, 'add_medicine']);
    Route::get('/findme_id/{id}', [App\Http\Controllers\Admin\MedicineController::class, 'findmeid']);
    Route::post('/edit_medicine', [App\Http\Controllers\Admin\MedicineController::class, 'edit_medicine']);

});
// Route::middleware(['guest'])->group(function () {
//     // routes that require user to be authenticated
    Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index']);

    Route::get('/patient', [App\Http\Controllers\Users\PatientController::class, 'index']);
    Route::get('/addpatient', [App\Http\Controllers\Users\PatientController::class, 'addpatient']);
    Route::post('/add_patient', [App\Http\Controllers\Users\PatientController::class, 'add_patient']);
    Route::get('/viewpatient/{id}', [App\Http\Controllers\Users\PatientController::class, 'viewpatient']);
    Route::get('/editpatient/{id}', [App\Http\Controllers\Users\PatientController::class, 'editpatient']);
    Route::post('/edit_patient/{id}', [App\Http\Controllers\Users\PatientController::class, 'edit_patient']);

    Route::get('/notipatient', [App\Http\Controllers\Users\NotiPatientController::class, 'index']);
    Route::post('/add_notipatient', [App\Http\Controllers\Users\NotiPatientController::class, 'add_notipatient']);
    Route::get('/findnop_id/{id}', [App\Http\Controllers\Users\NotiPatientController::class, 'findnopid']);
    Route::post('/edit_notipatient', [App\Http\Controllers\Users\NotiPatientController::class, 'edit_notipatient']);

// });
// Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index']);

