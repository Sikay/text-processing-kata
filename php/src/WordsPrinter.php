<?php

namespace TextProcessingKata;

class WordsPrinter
{

    const MAX_OUTPUT_WORDS = 10;
    const FIRST_LABEL = 1;

    public function print(array $words): string
    {
        $header = "Those are the top ";
        $header .= min(sizeof($words), self::MAX_OUTPUT_WORDS);
        $header .= " words used:\n\n";
        return $header . $this->buildBody($words);
    }

    private function buildBody(array $words): string
    {
        $body = '';
        $label = self::FIRST_LABEL;
        foreach ($words as $word) {
            $body .= $label . '. ' . $word;

            if ($this->isLastWord(sizeof($words), $label)) {
                return $body;
            }

            $body .= PHP_EOL;
            $label++;
        }
        return $body;
    }

    private function isLastWord(int $words, int $actualLabel): bool
    {
        return $actualLabel >= $words || $actualLabel >= self::MAX_OUTPUT_WORDS;
    }
}
