<?php

namespace TextProcessingKata;

class TopWordsService
{
    private TextProcessing $textProcessing;
    private WordsPrinter $printer;

    public function __construct(TextProcessing $textProcessing, WordsPrinter $printer)
    {
        $this->textProcessing = $textProcessing;
        $this->printer = $printer;
    }

    public function execute(string $text): string
    {
        return $this->printer->print($this->textProcessing->analyse($text));
    }
}
