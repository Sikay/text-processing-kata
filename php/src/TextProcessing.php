<?php declare(strict_types=1);

namespace TextProcessingKata;

class TextProcessing implements Processor
{
    private const CLEANER_CODE_SNIPPETS_REGEX = '/`[\s\S]+?`/';

    public function analyse(string $text): ProcessText
    {
        $words = explode(' ', $this->clean($text));
        return new ProcessText($this->orderByRepeatWords($words), sizeof($words));
    }

    private function clean(string $text): string
    {
        $lowerCaseText = strtolower($text);
        $textWithoutCodeSnippets = preg_replace(self::CLEANER_CODE_SNIPPETS_REGEX, '', $lowerCaseText);
        $textWithoutSigns = str_replace(['.', ','], '', $textWithoutCodeSnippets);
        return trim($textWithoutSigns);
    }

    private function orderByRepeatWords(array $words): array
    {
        $wordsRepeat = array_count_values($words);
        arsort($wordsRepeat);
        return array_keys($wordsRepeat);
    }
}
