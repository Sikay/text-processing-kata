<?php

namespace TextProcessingKata;

class ProcessText
{
    private array $topWords;
    private int $totalWords;

    public function __construct(array $topWords, int $totalWords)
    {
        $this->topWords = $topWords;
        $this->totalWords = $totalWords;
    }

    public function topWords(): array
    {
        return $this->topWords;
    }

    public function totalWords(): int
    {
        return $this->totalWords;
    }
}
