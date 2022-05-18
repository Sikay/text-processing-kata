<?php declare(strict_types=1);

namespace TextProcessingKata;

class TextProcessing
{
    public function analyse(string $text): array
    {
        $words = explode(' ', $this->clean($text));
        return $this->orderByRepeatWords($words);
    }

    private function clean(string $text)
    {
        return str_replace(['.', ','], '', strtolower($text));
    }

    private function orderByRepeatWords(array $words): array
    {
        $wordsRepeat = array_count_values($words);
        arsort($wordsRepeat);
        return array_keys($wordsRepeat);
    }
}
