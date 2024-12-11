<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jobs\ProcessTranscription;
use Illuminate\Support\Facades\Storage;

class TranscribeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke()
    {
        ProcessTranscription::dispatch(Storage::path('podcast.wav'));
    }
}
