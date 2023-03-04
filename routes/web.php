<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JsonObjectController;

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
    return redirect('/objects');
});

Route::get('/objects', [JsonObjectController::class, 'index'])->name('objects.index');

Route::get('/objects/create', [JsonObjectController::class, 'create'])->name('objects.create');
Route::match(['get', 'post'], '/objects/create/store', [JsonObjectController::class, 'store'])->name('objects.store');

Route::get('/objects/edit', [JsonObjectController::class, 'edit'])->name('objects.edit');
Route::match(['get', 'post'], '/objects/update', [JsonObjectController::class, 'update'])->name('objects.update');

Route::get('/objects/delete', [JsonObjectController::class, 'delete'])->name('objects.delete');
Route::delete('/objects/destroy', [JsonObjectController::class, 'destroy'])->name('objects.destroy');

Route::get('/objects/{id}', [JsonObjectController::class, 'show'])->name('objects.show');
Route::get('/objects/{id}/json', [JsonObjectController::class, 'json']);
