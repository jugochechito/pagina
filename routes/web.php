<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CarouselImageController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\DocumentController;

// Rutas públicas accesibles para cualquier usuario
Route::get('/', [Controller::class, 'showWelcome'])->name('welcome');
Route::get('/news/{news}', [Controller::class, 'showNews'])->name('news.show');

// Rutas de autenticación (generadas por php artisan ui vue --auth o php artisan ui bootstrap --auth)
Auth::routes();

// Rutas protegidas por middleware 'auth'
Route::middleware(['auth'])->group(function () {

    // Ruta de la página de inicio después de autenticarse
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    // Rutas para administración de imágenes del carrusel
    Route::prefix('admin')->group(function () {
        Route::get('/carousel', [CarouselImageController::class, 'index'])->name('carousel.index');
        Route::get('/carousel/create', [CarouselImageController::class, 'create'])->name('carousel.create');
        Route::post('/carousel', [CarouselImageController::class, 'store'])->name('carousel.store');
        Route::get('/carousel/{carouselImage}/edit', [CarouselImageController::class, 'edit'])->name('carousel.edit');
        Route::put('/carousel/{carouselImage}', [CarouselImageController::class, 'update'])->name('carousel.update');
        Route::delete('/carousel/{carouselImage}', [CarouselImageController::class, 'destroy'])->name('carousel.destroy');

        
        Route::resource('documents', DocumentController::class);

        Route::resource('news', NewsController::class)->except(['show']);
    });
});


