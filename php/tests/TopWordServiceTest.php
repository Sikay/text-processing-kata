<?php

namespace TextProcessingKataTests;

use PHPUnit\Framework\TestCase;
use TextProcessingKata\TextProcessing;
use TextProcessingKata\TopWordsService;
use TextProcessingKata\WordsPrinter;

class TopWordsServiceTest extends TestCase
{

    public function should_given_text_return_the_top_words_used(): void
    {
        $expected = "Those are the top 10 words used:" . PHP_EOL .
                    PHP_EOL .
                    "1. you" . PHP_EOL .
                    "2. this" . PHP_EOL .
                    "3. hello" . PHP_EOL .
                    "4. text" . PHP_EOL .
                    "5. test" . PHP_EOL .
                    "6. your" . PHP_EOL .
                    "7. as" . PHP_EOL .
                    "8. it" . PHP_EOL .
                    "9. make" . PHP_EOL .
                    "10. and" . PHP_EOL .
                    PHP_EOL .
                    "The text has in total 21 words";

        $text = "Hello, this is an example for you to practice. You should grab this text and make it as your test case.";
        $textProcessing = new TextProcessing();
        $printer = new WordsPrinter();
        $topWordService = new TopWordsService($textProcessing, $printer);
        self::assertSame($expected, $topWordService->execute($text));
    }
}
