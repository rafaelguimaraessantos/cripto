<?php

    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\AuthController;
    use App\Http\Controllers\DashboardController;
    use App\Http\Controllers\CriptoController;


    // Rota para a tela de login
    Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'login']);
    
    Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
    Route::get('/register', [App\Http\Controllers\Auth\RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [App\Http\Controllers\Auth\RegisterController::class, 'register']);

    // Rota para armazenar os dados da cripto
    Route::post('/criptos', [App\Http\Controllers\CriptoController::class, 'store'])->name('criptos.store');

    Route::get('/generate-token', [AuthController::class, 'generateToken']);
    Route::get('/decode-token', [AuthController::class, 'decodeToken']);

    
    Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');
    Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard');


    Route::post('/criptos', [CriptoController::class, 'store'])->name('criptos.store');
    Route::resource('criptos', CriptoController::class);
    Route::get('/criptos/create', [CriptoController::class, 'create'])->name('criptos.create')->middleware('auth');    
    Route::get('/criptos/{id}/edit', [CriptoController::class, 'edit'])->name('criptos.edit')->middleware('auth');
    Route::put('/criptos/{id}', [CriptoController::class, 'update'])->name('criptos.update');
    Route::resource('criptos', CriptoController::class)->middleware('auth');


    Route::delete('/criptos/{id}', [CriptoController::class, 'destroy'])->name('criptos.destroy');
    Route::get('/criptos/{asset}/networks', [CriptoController::class, 'getNetworks']);







    

