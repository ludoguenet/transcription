<?php

use App\Http\Controllers\TranscribeController;
use App\Jobs\ProcessTranscription;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

Route::view('/', 'upload');
Route::post('/transcribe', TranscribeController::class)->name('transcribe');
