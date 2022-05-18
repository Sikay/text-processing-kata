<?php declare(strict_types=1);

namespace TextProcessingKata;

class TextProcessing
{
    public function analyse(string $text): array
    {
        $textWithoutSigns = str_replace(['.', ','], '', $text);
        $words = explode(' ', $textWithoutSigns);
        $wordsRepeat = array_count_values($words);
        arsort($wordsRepeat);
        return array_keys($wordsRepeat);
    }
}
