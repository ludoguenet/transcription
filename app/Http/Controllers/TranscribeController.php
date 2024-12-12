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
    public function __invoke(Request $request)
    {
        $request->validate([
            'file' => 'nullable|mimes:flac,wav,mpga|max:2048',
        ]);

        $path = $request->file('file')->store('uploads');

        ProcessTranscription::dispatch(Storage::path($path));

        return back()->with('success', 'File uploaded and transcription started.');
    }
}
