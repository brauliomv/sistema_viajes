<?php

use App\Http\Controllers\Drivers\DriverController;
use App\Http\Controllers\Login\LoginController;
use App\Http\Controllers\Reports\ReportController;
use App\Http\Controllers\Stores\StoreController;
use App\Http\Controllers\Welcome\WelcomeController;
use App\Http\Controllers\Users\UserController;
use App\Http\Controllers\Workers\WorkerController;
use App\Http\Controllers\Rides\RideController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[LoginController::class,'index'])->name('login_form')->middleware('guest');

Route::post('/login',[LoginController::class,'login'])->name('login');

Route::get('/home',[WelcomeController::class,'index'])->name('welcome')->middleware('auth.basic');

Route::post('/logout',[LoginController::class,'logout'])->name('logout')->middleware('auth.basic');


/*

------------------------  Conductores  ------------------------ 

*/
//Index drivers
Route::get('/drivers',[DriverController::class,'index'])->name('show_drivers')->middleware('auth.basic');

//Create drivers
Route::get('/create-driver',[DriverController::class,'create'])->name('create_driver')->middleware('auth.basic');

//Store drivers
Route::post('/store-driver',[DriverController::class,'store'])->name('store_driver')->middleware('auth.basic');

//Edit driver view
Route::get('/edit-driver/{driver}',[DriverController::class,'edit'])->name('edit_driver')->middleware('auth.basic');

//Update driver route
Route::patch('/update-driver/{driver}',[DriverController::class,'update'])->name('update_driver')->middleware('auth.basic');

//Delete driver
Route::delete('/delete-driver/{driver}',[DriverController::class,'destroy'])->name('delete_driver')->middleware('auth.basic');


/*

------------------------  Usuarios  ------------------------ 

*/

//Index users
Route::get('/users',[UserController::class,'index'])->name('show_users')->middleware('auth.basic');

//Create users
Route::get('/create-user',[UserController::class,'create'])->name('create_user')->middleware('auth.basic');

//Store users
Route::post('/store-user',[UserController::class,'store'])->name('store_user')->middleware('auth.basic');

//Edit user view
Route::get('/edit-user/{user}',[UserController::class,'edit'])->name('edit_user')->middleware('auth.basic');

//Update user route
Route::patch('/update-user/{user}',[UserController::class,'update'])->name('update_user')->middleware('auth.basic');

//Delete user
Route::delete('/delete-user/{user}',[UserController::class,'destroy'])->name('delete_user')->middleware('auth.basic');


/*

------------------------  Sucursales  ------------------------ 

*/

//Index stores
Route::get('/stores',[StoreController::class,'index'])->name('show_stores')->middleware('auth.basic');

//Create store
Route::get('/create-store',[StoreController::class,'create'])->name('create_store')->middleware('auth.basic');

//Save store
Route::post('/save-store',[StoreController::class,'store'])->name('save_store')->middleware('auth.basic');

//Edit store view
Route::get('/edit-store/{store}',[StoreController::class,'edit'])->name('edit_store')->middleware('auth.basic');

//Update store route
Route::patch('/update-store/{store}',[StoreController::class,'update'])->name('update_store')->middleware('auth.basic');

//Show store details
Route::get('/store-details/{store}',[StoreController::class,'show'])->name('show_store')->middleware('auth.basic');

//Delete store
Route::delete('/delete-store/{store}',[StoreController::class,'destroy'])->name('delete_store')->middleware('auth.basic');

//Add distances
Route::patch('/add-distances/{store}',[StoreController::class,'distance'])->name('store_distance')->middleware('auth.basic');

/*

------------------------  Colaboradores  ------------------------ 

*/

//Index workers
Route::get('/workers',[WorkerController::class,'index'])->name('show_workers')->middleware('auth.basic');

//Create worker
Route::get('/create-worker',[WorkerController::class,'create'])->name('create_worker')->middleware('auth.basic');

//Save worker
Route::post('/save-worker',[WorkerController::class,'store'])->name('store_worker')->middleware('auth.basic');

//Edit worker view
Route::get('/edit-worker/{worker}',[WorkerController::class,'edit'])->name('edit_worker')->middleware('auth.basic');

//Update worker route
Route::patch('/update-worker/{worker}',[WorkerController::class,'update'])->name('update_worker')->middleware('auth.basic');


//Delete worker
Route::delete('/delete-worker/{worker}',[WorkerController::class,'destroy'])->name('delete_worker')->middleware('auth.basic');


/*

------------------------  Viajes  ------------------------ 

*/

//Index rides
Route::get('/rides',[RideController::class,'index'])->name('show_rides')->middleware('auth.basic');

//Create ride
Route::get('/create-ride',[RideController::class,'create'])->name('create_ride')->middleware(['auth.basic','isAdmin']);

//Select workers
Route::post('/asign-workers',[RideController::class,'asignWorkers'])->name('asign_workers')->middleware('auth.basic');

//Store ride
Route::post('/save-ride',[RideController::class,'store'])->name('store_ride')->middleware('auth.basic');



//Update ride route
Route::patch('/update-ride/{ride}',[RideController::class,'update'])->name('update_ride')->middleware('auth.basic');


//Ride details
Route::get('/ride-details/{ride}',[RideController::class,'rideDetails'])->name('ride_details')->middleware('auth.basic');



//Reports 

//Index
Route::get('/reports',[ReportController::class,'index'])->name('reports')->middleware('auth.basic');

//Generate report
Route::get('/generate-report',[ReportController::class,'generate'])->name('generate_report')->middleware('auth.basic');