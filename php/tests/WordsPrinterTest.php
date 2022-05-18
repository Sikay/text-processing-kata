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

    /** @test */
    public function should_print_ten_words_when_give_more_than_ten_words(): void
    {
        $wordsPrinter = new WordsPrinter();
        self::assertSame($wordsPrinter->print(['one_word', 'two_word', 'three_word', 'four_word', 'five_word', 'six_word', 'seven_word', 'eight_word', 'nine_word', 'ten_word', 'eleven_word']),
            "1. one_word\n2. two_word\n3. three_word\n4. four_word\n5. five_word\n6. six_word\n7. seven_word\n8. eight_word\n9. nine_word\n10. ten_word");
    }
}
