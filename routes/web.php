<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\DrinkController;
use App\Http\Controllers\NonFoodsController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\LaporanFoodController;
use App\Http\Controllers\LaporanDrinkController;
use App\Http\Controllers\LaporanNonFoodController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
})->name('login');
Route::post('/login', [UserController::class, 'login'])->name('login.user');



Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/tambah/users', function () {
        return view('admin.user.create');
    });
    Route::post('/tambahuser', [UserController::class, 'store'])->name('users.store');
    Route::get('/users/edit/{id}', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/users/update/{id}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/users/delete/{id}', [UserController::class, 'destroy'])->name('delete.user');
    Route::get('/foods', [ProdukController::class, 'index'])->name('food.index');
    Route::get('/tambah/foods', function () {
        return view('admin.produk.create');
    });
    Route::post('/tambah/foods', [ProdukController::class, 'store'])->name('foods.store');
    Route::get('/foods/edit/{id}', [ProdukController::class, 'edit'])->name('foods.edit');
    Route::put('/foods/update/{id}', [ProdukController::class, 'update'])->name('foods.update');
    Route::delete('/foods/delete/{id}', [ProdukController::class, 'destroy'])->name('delete.foods');
    Route::get('/drinks', [DrinkController::class, 'index'])->name('drink.index');
    Route::get('/tambah/drinks', function () {
        return view('admin.drink.create');
    });
    Route::post('/tambah/drinks', [DrinkController::class, 'store'])->name('drinks.store');
    Route::get('/drinks/edit/{id}', [DrinkController::class, 'edit'])->name('drinks.edit');
    Route::put('/drinks/update/{id}', [DrinkController::class, 'update'])->name('drinks.update');
    Route::delete('/drinks/delete/{id}', [DrinkController::class, 'destroy'])->name('delete.drinks');
    Route::get('/non-foods', [NonFoodsController::class, 'index'])->name('non-foods.index');
    Route::get('/tambah/non-foods', function () {
        return view('admin.non-food.create');
    });
    Route::post('/tambah/non-foods', [NonFoodsController::class, 'store'])->name('non-foods.store');
    Route::get('/non-foods/edit/{id}', [NonFoodsController::class, 'edit'])->name('non-foods.edit');
    Route::put('/non-foods/update/{id}', [NonFoodsController::class, 'update'])->name('non-foods.update');
    Route::delete('/non-foods/delete/{id}', [NonFoodsController::class, 'destroy'])->name('delete.non-foods');
    Route::get('/penjualan', [PenjualanController::class, 'index'])->name('penjualan.index');
    Route::get('/tambah/penjualan', [PenjualanController::class, 'create'])->name('penjualan.create');
    Route::post('/simpan/penjualan', [PenjualanController::class, 'store'])->name('penjualan.store');
    Route::get('/penjualan/edit/{id}', [PenjualanController::class, 'edit'])->name('penjualan.edit');
    Route::put('/penjualan/update/{id}', [PenjualanController::class, 'update'])->name('penjualan.update');
    Route::delete('/penjualan/{id}', [PenjualanController::class, 'destroy'])->name('penjualan.destroy');
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan.index');
    Route::get('/laporan/transaksi/export-excel', [LaporanController::class, 'exportExcel'])->name('laporan.exportExcel');
    Route::get('/laporan/transaksi/export-pdf', [LaporanController::class, 'exportPDF'])->name('laporan.exportPDF');
    Route::get('/laporan/transaksi/export-excel/{id}', [LaporanController::class, 'exportExcelById'])->name('laporan.exportExcelById');
    Route::get('/laporan/transaksi/export-pdf/{id}', [LaporanController::class, 'exportPDFById'])->name('laporan.exportPDFById');
    Route::get('/laporan/transaksi/print/{id}', [LaporanController::class, 'printById'])->name('laporan.printById');
    Route::post('/logout/users', [UserController::class, 'logout'])->name('logout');
    Route::get('/laporan/transaksi/print-all', [LaporanController::class, 'printAll'])->name('laporan.printAll');
    // laporan food
    Route::get('/laporan/food', [LaporanFoodController::class, 'index'])->name('laporan-food.index');
    Route::get('/laporan/food/export-excel/{id}', [LaporanFoodController::class, 'exportExcelById'])->name('laporan-excel.food');
    Route::get('/laporan/food/export-pdf/{id}', [LaporanFoodController::class, 'exportPDFById'])->name('laporan-pdfbyid.food');
    Route::get('/laporan/food/print/{id}', [LaporanFoodController::class, 'printById'])->name('laporan-food.printById');
    Route::get('/laporan/food/print-all', [LaporanFoodController::class, 'printAll'])->name('laporan-food.printAll');
    Route::get('/laporan/export-excel', [LaporanFoodController::class, 'exportExcel'])->name('laporan-food.exportExcel');
    Route::get('/laporan/export-pdf', [LaporanFoodController::class, 'exportPDF'])->name('laporan-food.exportPDF');
    // laporan drink
    Route::get('/laporan/drink', [LaporanDrinkController::class, 'index'])->name('laporan-drink.index');
    Route::get('/laporan/drink/export-excel/{id}', [LaporanDrinkController::class, 'exportExcelById'])->name('laporan-excel.drink');
    Route::get('/laporan/drink/export-pdf/{id}', [LaporanDrinkController::class, 'exportPDFById'])->name('laporan-pdfbyid.drink');
    Route::get('/laporan/drink/print/{id}', [LaporanDrinkController::class, 'printById'])->name('laporan-drink.printById');
    Route::get('/laporan/drink/print-all', [LaporanDrinkController::class, 'printAll'])->name('laporan-drink.printAll');
    Route::get('/laporan/drink/export-excel', [LaporanDrinkController::class, 'exportExcel'])->name('laporan-drink.exportExcel');
    Route::get('/laporan/drink/export-pdf', [LaporanDrinkController::class, 'exportPDF'])->name('laporan-drink.exportPDF');
    // laporan non-food
    Route::get('/laporan/non-food', [LaporanNonFoodController::class, 'index'])->name('laporan-non-food.index');
    Route::get('/laporan/non-food/export-excel/{id}', [LaporanNonFoodController::class, 'exportExcelById'])->name('laporan-excel.non-food');
    Route::get('/laporan/non-food/export-pdf/{id}', [LaporanNonFoodController::class, 'exportPDFById'])->name('laporan-pdfbyid.non-food');
    Route::get('/laporan/non-food/print/{id}', [LaporanNonFoodController::class, 'printById'])->name('laporan-non-food.printById');
    Route::get('/laporan/non-food/print-all', [LaporanNonFoodController::class, 'printAll'])->name('laporan-non-food.printAll');
    Route::get('/laporan/non-food/export-excel', [LaporanNonFoodController::class, 'exportExcel'])->name('laporan-non-food.exportExcel');
    Route::get('/laporan/non-food/export-pdf', [LaporanNonFoodController::class, 'exportPDF'])->name('laporan-non-food.exportPDF');
    // plu
    Route::get('/produk/plu/{plu}', [ProdukController::class, 'getProdukByPLU'])->name('produk.getProdukByPLU');
    Route::get('/produk/search', [ProdukController::class, 'searchPLU'])->name('produk.searchPLU');
});
