<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::middleware(['auth'])->group(function () {
    Route::get('/', function () {
        return view('home', ['breadcrumbs' => [
                                                    ['label' => 'Home', 'route' => route('home')],
                                                    ['label' => 'Dashboard', 'route' => ''],
                                                ]]);
    })->name('home');

    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/users/create', [UserController::class, 'store'])->name('users.store');
    Route::get('/users/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::get('/users/delete', [UserController::class, 'delete'])->name('users.delete');
});