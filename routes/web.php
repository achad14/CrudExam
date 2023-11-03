<?php
 
use Illuminate\Support\Facades\Route;
use App\Models\Company;
 
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\CompanyController;
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
// custom create routes 

Route::prefix('admin')->middleware('auth', 'atadmin')->group(function(){

});


Route::get('/', [AuthController::class, 'index'])->name('login');
Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('action-login', [AuthController::class, 'actionLogin'])->name('login.action');
Route::get('registration', [AuthController::class, 'registration'])->name('register');
Route::post('action-registration', [AuthController::class, 'actionRegistration'])->name('register.action');
Route::get('dashboard', [AuthController::class, 'dashboard']);
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

Route::resource('companies', CompanyController::class);


 
?>