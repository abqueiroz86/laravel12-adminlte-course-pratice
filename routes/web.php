<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function () {
    Route::get('/', function () {
        return view('home', ['breadcrumbs' => [
                                                    ['label' => 'Home', 'route' => route('home')],
                                                    ['label' => 'Dashboard', 'route' => ''],
                                                ]]);
    })->name('home');
});