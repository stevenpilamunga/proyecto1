<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CursosController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\GenerarOrdenesController;


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
Route::get('/info',[TestController::class,'info'])->name('info');
Route::post('/info',[TestController::class,'store'])->name('info');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
     // Rutas relacionadas con el perfil del usuario
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// Rutas de recursos para los  usuarios
    
    Route::resource('users',UsersController::class);
    

// Rutas de recursos para los cursos 
    Route::get('/cursos', [CursosController::class, 'index'])->name('cursos.index');
    Route::get('/cursos/create', [CursosController::class, 'create'])->name('cursos.create');
    Route::post('/cursos', [CursosController::class, 'store'])->name('cursos.store');
    Route::get('/cursos/{curso}/edit', [CursosController::class, 'edit'])->name('cursos.edit');
    Route::put('/cursos/{curso}', [CursosController::class, 'update'])->name('cursos.update');
    Route::delete('/cursos/{curso}', [CursosController::class, 'destroy'])->name('cursos.destroy');
    
    
 // Rutas relacionadas con la generación de órdenes
    Route::get('/generar_ordenes',[GenerarOrdenesController::class,'index'])->name('generar_ordenes');
    Route::post('/generarOrdenes', [GenerarOrdenesController::class, 'generarOrdenes'])->name('generarOrdenes');
    Route::post('/eliminaorden',[GenerarOrdenesController::class,'eliminaorden'])->name('eliminaorden');
    Route::get('/ordenes_generadas.show/{especial}', [GenerarOrdenesController::class, 'show'])->name('ordenes_generadas.show');
   
    //excel
   Route::get('/exportarOrdenes/{especial}', [GenerarOrdenesController::class, 'exportarOrdenes'])->name('exportarOrdenes');
});



require __DIR__.'/auth.php';
