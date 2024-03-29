<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GithubIssuesController;

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

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/github-issues', [GithubIssuesController::class, 'index'])->name('github-issues.index');
Route::get('/github-issues/create', [GithubIssuesController::class, 'create'])->name('github-issues.create');
Route::post('/github-issues', [GithubIssuesController::class, 'createIssue'])->name('github-issues.store');
Route::post('/github-issues/{issue}/close', [GithubIssuesController::class, 'closeIssue'])->name('github-issues.close');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('todos', TodoController::class)->middleware('auth');

require __DIR__.'/auth.php';
