<?php

namespace App\Http\Controllers;

use App\Jobs\TranscribeProcess;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TranscribeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $request->validate(['podcast' => 'required|file|mimes:mp3|max:2048']);

        $path = $request->file('podcast')->store('uploads');

        TranscribeProcess::dispatch(Storage::path($path));

        return back()->with('success', 'File uploaded and transcription started.');
    }
}
