<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FormationController;
use App\Http\Controllers\TypeController;
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

Route::get('/', [FormationController::class, "index"])->name('index');

Route::get("categories", [CategoryController::class,'create'])->name("addCategory");
Route::post("categories", [CategoryController::class,'store'])->name("storeCategory");
Route::delete("categories/{id}", [CategoryController::class,'delete'])->name("deleteCategory");

Route::get("type", [TypeController::class,'create'])->name("addType");
Route::post("type", [TypeController::class,'store'])->name("storeType");
Route::delete("type/{id}", [TypeController::class,'delete'])->name("deleteType");

Route::get("formations", [FormationController::class,'create'])->name("addFormation");
Route::post("formations", [FormationController::class,'store'])->name("storeFormation");
Route::post("formations/{id}", [FormationController::class,'details'])->name("detailsFormation");
Route::delete("formations/{id}", [FormationController::class,'delete'])->name("deleteFormation");

require __DIR__.'/auth.php';
