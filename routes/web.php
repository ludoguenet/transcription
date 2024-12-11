<?php

use App\Http\Controllers\TranscribeController;
use App\Jobs\ProcessTranscription;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/transcribe', TranscribeController::class);
