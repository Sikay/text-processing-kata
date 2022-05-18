<?php

namespace TextProcessingKataTests;

use PHPUnit\Framework\TestCase;
use TextProcessingKata\WordsPrinter;

class WordsPrinterTest extends TestCase
{
    /** @test */
    public function should_print_words_when_give_one_word(): void
    {
        $wordsPrinter = new WordsPrinter();
        self::assertSame($wordsPrinter->print(['one_word']), '1. one_word');
    }

    /** @test */
    public function should_print_words_when_give_two_words(): void
    {
        $wordsPrinter = new WordsPrinter();
        self::assertSame($wordsPrinter->print(['one_word', 'two_word']), "1. one_word\n2. two_word");
    }
}
