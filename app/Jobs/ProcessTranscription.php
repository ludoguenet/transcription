<?php

namespace App\Jobs;

use Codewithkyrian\Whisper\Whisper;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;

use Codewithkyrian\Whisper\WhisperFullParams;
use function Codewithkyrian\Whisper\readAudio;

class ProcessTranscription implements ShouldQueue
{
    use Queueable;

    const PATHNAME = 'transcription.txt';

    public $timeout = 120;

    /**
     * Create a new job instance.
     */
    public function __construct(private readonly string $pathfile)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $params = WhisperFullParams::default()
            ->withNThreads(8)
            ->withLanguage(config('app.locale'));

        $whisper = Whisper::fromPretrained(
            'tiny.en',
            baseDir: config('services.whisper.models_directory'),
            params: $params
        );

        $audio = readAudio($this->pathfile);

        $segments = $whisper->transcribe($audio);

        $this->saveFile($segments);
    }

    private function saveFile(array $segments)
    {
        $text = '';

        foreach($segments as $segment) {
            $text.= $segment->text;
        }

        Storage::put(self::PATHNAME, $text);
    }
}