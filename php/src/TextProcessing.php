<?php declare(strict_types=1);

namespace TextProcessingKata;

class TextProcessing
{
    public function analyse(string $text): array
    {
        $textWithoutSigns = str_replace(['.', ','], '', $text);
        return explode(' ', $textWithoutSigns);
    }
}
