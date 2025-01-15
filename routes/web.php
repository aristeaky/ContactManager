<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;

Route::get('/contacts',[ContactController::class,"index"])->name("contacts.index");
Route::get('/contacts/showAll', [ContactController::class, 'showAll'])->name('contacts.showAll');
Route::get('/contacts/search', [ContactController::class, 'search'])->name('contacts.search');
Route::resource('contacts', ContactController::class)->except(['index', 'search']);
Route::get("/contacts/create",[ContactController::class,"create"])->name("contacts.create");
Route::post('/contacts', [ContactController::class, 'store'])->name('contacts.store');
Route::get('/contacts/{id}/edit', [ContactController::class, 'edit'])->name('contacts.edit');
Route::put('/contacts/{id}', [ContactController::class, 'update'])->name('contacts.update');
Route::delete('/contacts/{id}', [ContactController::class, 'destroy'])->name('contacts.destroy');
