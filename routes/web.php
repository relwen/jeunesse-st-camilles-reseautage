<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\AccreditateController;


Route::get('/', [ArticleController::class, 'welcome'])->name('welcome');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/activite/{id}', [ArticleController::class, 'activityDetails'])->name('activite.show');
Route::get('/concours', [ArticleController::class, 'concours'])->name('concours');
Route::get('/talkcrea', [ArticleController::class, 'concours'])->name('talkcrea');
Route::get('/accredidate', [ArticleController::class, 'accredidate'])->name('accredidate');
Route::get('/submission/success', [FormController::class, 'success'])->name('submission.success');
Route::post('/form/store', [FormController::class, 'store'])->name('form.store');
Route::post('/acredidate/store', [AccreditateController::class, 'store'])->name('acredidate.store');



    Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');

    Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
    
    Route::resource('articles', ArticleController::class);
    Route::resource('messages', MessageController::class);

    Route::get('/responses', [FormController::class, 'showResponses'])->name('form.index');
    Route::get('/forms/{id}', [FormController::class, 'show'])->name('form.show');

    Route::get('/accreditation', [AccreditateController::class, 'showResponses'])->name('accreditation.index');
    Route::get('/accred/{id}', [AccreditateController::class, 'show'])->name('accreditation.responses.show');



});



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');