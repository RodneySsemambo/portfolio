<?php

use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn() => view('welcome'));
Route::post('/contact', [ContactController::class, 'store']);
