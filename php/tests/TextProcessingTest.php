<?php declare(strict_types=1);

namespace TextProcessingKataTests;

use TextProcessingKata\TextProcessing;
use PHPUnit\Framework\TestCase;

class TextProcessingTest extends TestCase
{
    /** @test */
    public function should_return_the_most_repeated_word(): void
    {
        $text = 'Hello, this is an example for you to practice. You should grab this text and make it as your test case.';
        $textProcessor = new TextProcessing();
        $mostRepeatedWord = $textProcessor->analyse($text);

        self::assertTrue($mostRepeatedWord === 'you');
    }

    /** @test */
    public function should_return_the_most_repeated_word_2(): void
    {
        $text = 'Hello, this. is an example for you to practice. You, should grab this text, and make it as your test case.';
        $textProcessor = new TextProcessing();
        $mostRepeatedWord = $textProcessor->analyse($text);

        self::assertTrue($mostRepeatedWord === 'you');
    }
}
