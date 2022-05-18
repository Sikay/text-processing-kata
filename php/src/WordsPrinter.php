<?php

namespace TextProcessingKata;

class WordsPrinter
{

    const MAX_OUTPUT_WORDS = 10;
    const FIRST_LABEL = 1;

    public function print(array $words): string
    {
        return $this->buildHeader($words) . PHP_EOL . $this->buildBody($words) . PHP_EOL . $this->buildFooter($words);;
    }

    private function buildBody(array $words): string
    {
        $body = '';
        $label = self::FIRST_LABEL;
        foreach ($words as $word) {
            $body .= $label . '. ' . $word . PHP_EOL;
            if ($this->isLastWord(sizeof($words), $label)) {
                return $body;
            }
            $label++;
        }
        return $body;
    }

    private function isLastWord(int $words, int $actualLabel): bool
    {
        return $actualLabel >= min($words,self::MAX_OUTPUT_WORDS);
    }

    private function buildHeader(array $words): string
    {
        return "Those are the top " . min(sizeof($words), self::MAX_OUTPUT_WORDS) . " words used:" . PHP_EOL;
    }

    private function buildFooter(array $words): string
    {
        return "The text has in total " . sizeof($words) . " words";
    }
}
