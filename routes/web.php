<?php

use App\Http\Controllers\GoodsAndServicesController;
use App\Http\Controllers\SuppliersController;
use App\Models\Suppliers;
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
    return view('welcome');
});

Route::get('/vevok', function () {
    return view('customers', ["customers"=>\App\Models\Customers::all()]);
});

Route::get('/beszallitok', function () {
    return view('suppliers', ["suppliers"=>Suppliers::all()]);
})->name("list_suppliers");
Route::get('/beszallitok/hozzaadas', [SuppliersController::class, 'addSupplier']);
Route::post('/beszallitok/hozzaadas', [SuppliersController::class, 'createSupplier']);
Route::get('/beszallitok/{id}', [SuppliersController::class, 'viewSupplier'])->name('view_supplier');
Route::get('/beszallitok/{id}/modositas', [SuppliersController::class, 'editSupplier']);
Route::post('/beszallitok/{id}/modositas', [SuppliersController::class, 'updateSupplier']);
Route::delete('/beszallitok/{id}/beszallitotorlese', [SuppliersController::class, 'deleteSupplier'])
    ->name('delete_supplier');

Route::get('/termekek', function () {
    return view('goods', ["goods"=>\App\Models\GoodsAndServices::all()->where("type","=","G")]);
})->name("list_goods");

Route::get('/termekek/hozzaadas', [GoodsAndServicesController::class, 'addGood']);
Route::post('/termekek/hozzaadas', [GoodsAndServicesController::class, 'createGood']);
Route::get('/termekek/{id}', [GoodsAndServicesController::class, 'viewGood'])->name('view_good');
Route::get('/termekek/{id}/modositas', [GoodsAndServicesController::class, 'editGood']);
Route::post('/termekek/{id}/modositas', [GoodsAndServicesController::class, 'updateGood']);
Route::delete('/termekek/{id}/termektorlese', [GoodsAndServicesController::class, 'deleteGood'])
    ->name('delete_good');

Route::get('/szolgaltatasok', function () {
    return view('services', ["services"=>\App\Models\GoodsAndServices::all()->where("type","=","S")]);
})->name("list_services");

Route::get('/szolgaltatasok/hozzaadas', [GoodsAndServicesController::class, 'addService']);
Route::post('/szolgaltatasok/hozzaadas', [GoodsAndServicesController::class, 'createService']);
Route::get('/szolgaltatasok/{id}', [GoodsAndServicesController::class, 'viewService'])->name('view_service');
Route::get('/szolgaltatasok/{id}/modositas', [GoodsAndServicesController::class, 'editService']);
Route::post('/szolgaltatasok/{id}/modositas', [GoodsAndServicesController::class, 'updateService']);
Route::delete('/szolgaltatasok/{id}/szolgaltatastorlese', [GoodsAndServicesController::class, 'deleteService'])->name('delete_service');

Route::get('/szamlak', function () {
    return view('invoices', ["invoices"=>\App\Models\Invoices::all()]);
});


