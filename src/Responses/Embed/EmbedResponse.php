<?php

namespace ArdaGnsrn\Ollama\Responses\Embed;

use ArdaGnsrn\Ollama\Contracts\ResponseContract;

class EmbedResponse implements ResponseContract
{
    private function __construct(
        public readonly string $model,
        public readonly array  $embeddings,
        public readonly int    $totalDuration,
        public readonly int    $loadDuration,
        public readonly int    $promptEvalCount,
    )
    {
    }

    public static function from(array $attributes): EmbedResponse
    {
        return new self(
            model: $attributes['model'],
            embeddings: $attributes['embeddings'],
            totalDuration: $attributes['total_duration'],
            loadDuration: $attributes['load_duration'],
            promptEvalCount: $attributes['prompt_eval_count'],
        );
    }

    public function toArray(): array
    {
        return [
            'model' => $this->model,
            'embeddings' => $this->embeddings,
            'total_duration' => $this->totalDuration,
            'load_duration' => $this->loadDuration,
            'prompt_eval_count' => $this->promptEvalCount,
        ];
    }
}
