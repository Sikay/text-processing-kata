<?php

namespace TextProcessingKata;

class WordsPrinter
{

    const MAX_OUTPUT_WORDS = 10;
    const FIRST_LABEL = 1;

    public function print(ProcessText $processText): string
    {
        return $this->buildHeader($processText->topWords()) . PHP_EOL .
            $this->buildBody($processText->topWords()) . PHP_EOL .
            $this->buildFooter($processText->totalWords());
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

    private function buildFooter(int $totalWords): string
    {
        return "The text has in total " . $totalWords . " words";
    }
}
