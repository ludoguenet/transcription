<?php

namespace App\Jobs;

use Codewithkyrian\Whisper\Whisper;
use Codewithkyrian\Whisper\WhisperFullParams;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Storage;

use function Codewithkyrian\Whisper\readAudio;

class TranscribeProcess implements ShouldQueue
{
    use Queueable;

    public $timeout = 120;

    /**
     * Create a new job instance.
     */
    public function __construct(private readonly string $filepath)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $params = WhisperFullParams::default()
            ->withNThreads(4)
            ->withLanguage(app()->getLocale());

        $whisper = Whisper::fromPretrained(
            'tiny.en',
            baseDir: config('services.whisper.models_directory'),
            params: $params,
        );

        $audio = readAudio($this->filepath);

        $segments = $whisper->transcribe($audio);

        $this->saveFile($segments);
    }

    private function saveFile(array $segments): void
    {
        $text = '';

        foreach ($segments as $segment) {
            $text .= $segment->text;
        }

        Storage::put('/podcasts/transcription.txt', $text);
    }
}
