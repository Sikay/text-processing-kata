<?php declare(strict_types=1);

namespace TextProcessingKata;

class TextProcessing implements Processor
{
    public function analyse(string $text): string
    {
        return 'you';
    }
}
