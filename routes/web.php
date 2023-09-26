<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FiliereController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ExamenController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\AuthController;

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
    return view('welcome');
});

Route::get("login",[AuthController::class,'index'])->name("login");
Route::post("login",[AuthController::class,'customLogin'])->name("login.user");
Route::get("register",[AuthController::class,'registration'])->name("register");
Route::post("register",[AuthController::class,'customRegistration'])->name("register.user");
Route::get("signout",[AuthController::class,'signOut'])->name("signout");

Route::get("/exams/results/show",[ExamenController::class,"showResult"])->name("exams.results.show");

Route::middleware("auth")->group(function(){
    
Route::prefix("filieres")->group(function(){
    Route::get("/",[FiliereController::class, 'index'])->name("filiere.index"); 
    Route::get("/create",[FiliereController::class, 'create'])->name("filiere.create");
    Route::post('/',[FiliereController::class, 'store'])->name("filiere.store");
    Route::get('/{filiere}',[FiliereController::class, 'edit'])->name("filiere.edit");
    Route::put('/{id} ',[FiliereController::class, 'update'])->name("filiere.update");
    Route::delete('/{filiere}',[FiliereController::class, 'destroy'])->name("filieres.destroy");

});

Route::prefix('courses')->group(function(){
    Route::get("/",[CourseController::class, "index"])->name("courses.index"); 
    Route::get("/create",[CourseController::class,'create'])->name("courses.create");  
    Route::post('/',[CourseController::class, 'store'])->name("courses.store");
    Route::get('/{course}',[CourseController::class, 'edit'])->name("courses.edit");
    Route::put('/{id} ',[CourseController::class, 'update'])->name("courses.update");
    Route::delete('/{course}',[CourseController::class, 'destroy'])->name("courses.destroy");

}); 

Route::prefix('students')->group(function(){
    Route::get("/",[StudentController::class, "index"])->name("students.index"); 
    Route::get("/create",[StudentController::class, "create"])->name("students.create"); 
    Route::post("/",[StudentController::class, "store"])->name("students.store");
    Route::get('/{student}',[StudentController::class, 'edit'])->name("students.edit");
    Route::put('/{id} ',[StudentController::class, 'update'])->name("students.update");
    Route::delete('/{student}',[StudentController::class, 'destroy'])->name("students.destroy");
 

});

Route::prefix('exams')->group(function(){
    Route::get("results",[ExamenController::class,"createNote"])->name("exams.results.create");
    Route::post("results",[ExamenController::class,"storeResult"])->name("exams.results.store");

    Route::get('/',[ExamenController::class, 'index'])->name("exams.index");
    Route::get('/create',[ExamenController::class, 'create'])->name("exams.create");
    Route::post("/",[ExamenController::class, "store"])->name("exams.store");
    Route::get('/{exam}',[ExamenController::class, 'edit'])->name("exams.edit");
    Route::put('/{id} ',[ExamenController::class, 'update'])->name("exams.update");
    Route::delete('/{exam}',[ExamenController::class, 'destroy'])->name("exams.destroy");
 

});

});
