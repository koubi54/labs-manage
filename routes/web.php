<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\PaiementController;
use App\Http\Controllers\UserController;

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


$router->get('/clients', [ClientController::class, 'index'])->middleware(['auth'])->name('lstClts');
$router->get('/', [HomeController::class, 'dashboard'])->middleware(['auth'])->name('index');
$router->get('/client/add', [HomeController::class, 'index'])->middleware(['auth'])->name('addCltGET');

$router->post('/client/add', [ClientController::class, 'add'])->middleware(['auth'])->name('addClt');
Route::match(['get', 'post'], '/dossier/{id}',[ClientController::class, 'details'])->middleware(['auth'])->name('detailsClt');


Route::match(['get', 'post'],'/services', [ServiceController::class, 'index'])->middleware(['auth'])->name('lstService');
$router->post('/service/add', [ServiceController::class, 'add'])->middleware(['auth'])->name('addService');
Route::match(['get', 'post'],'/service/detail/{idService}', [ServiceController::class, 'details'])->middleware(['auth'])->name('detailService');

$router->get('/users', [UserController::class, 'index'])->middleware(['auth'])->name('lstUsers');
Route::match(['get', 'post'],'/user/add',[UserController::class, 'add'])->middleware(['auth'])->name('addUser');;

$router->get('/paiements', [PaiementController::class, 'index'])->middleware(['auth'])->name('lstPaiement');
Route::match(['get', 'post'],'/paiements/add/{idService}',[PaiementController::class, 'addPaiement'])->middleware(['auth'])->name('addPaiement');;
$router->get('/login', [HomeController::class, 'login'])->name('login');
$router->post('/login', [AdminController::class, 'login'])->name('auth');
$router->post('/logout',function(){
     Auth::logout();
     return redirect('/login');
})->name('logout');

