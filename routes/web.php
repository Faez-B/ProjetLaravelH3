<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FormationController;

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

Route::get("types", [TypeController::class,'create'])->name("addType");
Route::post("types", [TypeController::class,'store'])->name("storeType");
Route::delete("types/{id}", [TypeController::class,'delete'])->name("deleteType");

Route::get("formations", [FormationController::class,'create'])->name("addFormation");
Route::post("formations", [FormationController::class,'store'])->name("storeFormation");
Route::post("formations/recherche", [FormationController::class,'searchName'])->name("searchName");
Route::get("formations/category/{category}", [FormationController::class,'searchCat'])->name("searchCat");
Route::get("formations/type/{type}", [FormationController::class,'searchType'])->name("searchType");
Route::get("formations/formateur/{nom}", [FormationController::class,'searchFormateur'])->name("searchFormateur");
Route::post("formations/{id}", [FormationController::class,'update'])->name("updateFormation");
Route::get("formations/{id}", [FormationController::class,'details'])->name("detailsFormation");
Route::delete("formations/{id}", [FormationController::class,'delete'])->name("deleteFormation");

Route::get("chapters", [UserController::class,'create'])->name("addChapter");
Route::post("chapters", [UserController::class,'store'])->name("storeChapter");
Route::post("chapters/{id}", [UserController::class,'update'])->name("updateChapter");
Route::get("chapters/{id}", [UserController::class,'details'])->name("detailsChapter");
Route::delete("chapters/{id}", [UserController::class,'delete'])->name("deleteChapter");

Route::get("contact", [ContactController::class,'contact'])->name("contact");
Route::post("contact", [ContactController::class,'send'])->name("sendEmail");
// Route::get("contact", [ContactController::class,'contact'])->name("contact");
// Route::get("contact", [ContactController::class,'contact'])->name("contact");
// Route::get("contact", [ContactController::class,'contact'])->name("contact");

Route::get("/email/{email}/firstname/{firstname}/lastname/{lastname}", [UserController::class,'create'])->name("addUser");
Route::post("utilisateurs", [UserController::class,'store'])->name("storeUser");
Route::post("utilisateurs/image/{id}", [UserController::class,'updatePictureUser'])->name("updatePictureUser");
Route::post("utilisateurs/{id}", [UserController::class,'update'])->name("updateUser");
Route::get("utilisateurs/{id}", [UserController::class,'details'])->name("detailsUser");
Route::delete("utilisateurs/{id}", [UserController::class,'delete'])->name("deleteUser");

require __DIR__.'/auth.php';
