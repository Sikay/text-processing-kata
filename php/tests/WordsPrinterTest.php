<?php

namespace TextProcessingKataTests;

use PHPUnit\Framework\TestCase;
use TextProcessingKata\WordsPrinter;

class WordsPrinterTest extends TestCase
{
    public function wordsProvider(): iterable
    {
        yield [['one_word'], '1. one_word'];
        yield [['one_word', 'two_word'], "1. one_word\n2. two_word"];
        yield [['one_word', 'two_word', 'three_word', 'four_word', 'five_word', 'six_word', 'seven_word', 'eight_word', 'nine_word', 'ten_word', 'eleven_word'],
            "1. one_word\n2. two_word\n3. three_word\n4. four_word\n5. five_word\n6. six_word\n7. seven_word\n8. eight_word\n9. nine_word\n10. ten_word"];
    }

    /**
     * @test
     * @dataProvider wordsProvider
     */
    public function should_print_words_at_same_order_when_give_array_of_word(array $words, string $expected): void
    {
        $wordsPrinter = new WordsPrinter();
        self::assertSame($expected, $wordsPrinter->print($words));
    }
}
