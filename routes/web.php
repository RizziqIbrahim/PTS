<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KaryawanController;

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
//     return view('index');
// });

Route::get('/', [KaryawanController::class, 'index'])->name("index");
Route::get('/edit/{id}', [KaryawanController::class, 'edit'])->name("edit");
Route::get('/create', [KaryawanController::class, 'create'])->name("create");
Route::post("/addData", [KaryawanController::class, 'addData'])->name("addData");
Route::any("/updateData", [KaryawanController::class, 'updateData'])->name("updateData");
Route::get('delete/{id}', [KaryawanController::class, 'deleteData'])->name("deleteData");

Route::get("/exportKaryawan", [KaryawanController::class, 'karyawanExport'])->name("karyawanExport");
Route::post('/importkaryawan', [KaryawanController::class, 'karyawanImport'])->name("karyawanImport");
