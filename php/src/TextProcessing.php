<?php declare(strict_types=1);

namespace TextProcessingKata;

class TextProcessing implements Processor
{
    public function analyse(string $text): ProcessText
    {
        $words = explode(' ', $this->clean($text));
        return new ProcessText($this->orderByRepeatWords($words), sizeof($words));
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
