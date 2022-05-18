<?php

namespace TextProcessingKata;

class TopWordsService
{
    private Processor $textProcessing;
    private WordsPrinter $printer;

    public function __construct(Processor $textProcessing, WordsPrinter $printer)
    {
        $this->textProcessing = $textProcessing;
        $this->printer = $printer;
    }

    public function execute(string $text): string
    {
        return $this->printer->print($this->textProcessing->analyse($text));
    }
}
