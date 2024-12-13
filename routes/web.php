<?php

use App\Http\Controllers\TranscribeController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'upload');
Route::post('/transcribe', TranscribeController::class)->name('transcribe');
