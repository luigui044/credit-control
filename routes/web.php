<?php

use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\HomeController;
use  App\Http\Controllers\CreditController;
use  App\Http\Controllers\ClientController;
use  App\Http\Controllers\HouseController;
use  App\Http\Controllers\PaymentController;
use  App\Http\Controllers\ReportController;


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



Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');

///rutas de acreedores
Route::get('/clientes', [ClientController::class, 'acreedores'])->name('clientes');
Route::get('/agregar-cliente', [ClientController::class, 'addClient'])->name('addClient');
Route::get('/editar-cliente/{id}', [ClientController::class, 'editClient'])->name('editClient');
Route::get('/consultar-cliente/{id}', [ClientController::class, 'getClient'])->name('getClient');
Route::post('/filter-muni', [ClientController::class, 'filtMuni'])->name('filtMuni');
Route::post('/agregar-cliente', [ClientController::class, 'saveClient'])->name('saveClient');
Route::post('/editar-cliente/{id}', [ClientController::class, 'updateClient'])->name('updateClient');
Route::put('/desactivar-cliente/{id}/{state}', [ClientController::class, 'disableClient'])->name('disableClient');
///rutas de creditos
Route::get('/creditos',[CreditController::class, 'getCredits'])->name('getCredits');
Route::get('/agregar-creditos',[CreditController::class, 'addCredits'])->name('addCredits');
Route::post('/agregar-creditos',[CreditController::class, 'saveCredit'])->name('saveCredit');
///rutas de casas

Route::get('/casas',[HouseController::class, 'getHouses'])->name('getHouses');
Route::get('/agregar-casa',[HouseController::class, 'addHouse'])->name('addHouse');
Route::post('/agregar-casa', [HouseController::class, 'saveHouse'])->name('saveHouse');
Route::post('/valor-casa', [HouseController::class, 'valueHouse'])->name('valueHouse');
Route::get('/detalle-casa/{id}', [HouseController::class, 'detailHouse'])->name('detailHouse');

///rutas de transacciones
Route::get('/pago-credito', [PaymentController::class, 'payCredit'])->name('payCredit');
Route::post('/get-credits/{id}', [PaymentController::class, 'getCreditsByIdClient'])->name('getCreditsByIdClient');
Route::post('/get-couta/{credito}', [PaymentController::class, 'getCuotaByIdCredit'])->name('getCuotaByIdCredit');
Route::post('/save-payment', [PaymentController::class, 'savePayment'])->name('savePayment');

///reportes 
Route::get('/informe-credito/{id}',[ReportController::class,'reportCredit'])->name('reportCredit');
Route::get('/generate-pdf/{id}', [ReportController::class, 'generatePDF'])->name('generatePDF');
Route::get('/generate-recipe/{id}',[ReportController::class,'generateRecipe'])->name('generateRecipe');
// Route::get('/test/{id}', [ReportController::class, 'generatePDF2'])->name('generatePDF2');
