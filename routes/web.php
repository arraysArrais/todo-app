<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TaskController;
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

//Middlewares são executados ao chamar uma rota e rodam antes do Controller/método
//Middleware Auth vai verificar se o usuário está ou não autenticado, atribuimos ele a uma rota assim: ->middleware('auth')
//se não estiver autenticado, ele redireciona para a rota '/login' por padrão
//podemos alterar a rota que o middleware redireciona caso o usuário não esteja autenticado em app/http/middleware/authenticate.php


//agrupando as rotas em um único middleware para não chamar o middleware individualmente em cada rota
Route::middleware(['auth'])->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/task/new', [TaskController::class, 'create'])->name('task.create');
    Route::post('/task/create_action', [TaskController::class, 'create_action'])->name('task.create_action');
    Route::get('/task/edit', [TaskController::class, 'edit'])->name('task.edit');
    // Route::get('/task/edit/{id}', [TaskController::class, 'edit'])->name('task.edit');
    Route::post('/task/edit_action', [TaskController::class, 'edit_action'])->name('task.edit_action');
    Route::get('/task/delete', [TaskController::class, 'delete'])->name('task.delete');
    Route::get('/task', [TaskController::class, 'index'])->name('task.view');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::post('/task/update', [TaskController::class, 'update'])->name('task.update');
});


Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'login_action'])->name('login_action');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'register_action'])->name('register_action');



// Route::get('/', function () {
//     return view('home');
// });

// Route::get('/login', function () {
//     return view('login');
// });
