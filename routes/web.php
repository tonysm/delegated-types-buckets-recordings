<?php

use App\Http\Controllers;
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

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard', [
            'feedItems' => auth()->user()->bucket
                ->feedItems()
                ->latest()
                ->take(50)
                ->get(),
        ]);
    })->name('dashboard');

    Route::resource('buckets.todos', Controllers\BucketTodosController::class)
        ->parameters([
            'todos' => 'recording',
        ]);
});

require __DIR__.'/auth.php';
