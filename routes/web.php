<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ToDoListController;

Route::get('/', [ToDoListController::class, 'index'])->name('index');
Route::post('/', [ToDoListController::class, 'store'])->name('store');
Route::delete('/{todolist:id}', [ToDoListController::class, 'destroy'])->name('destroy');
