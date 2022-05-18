<?php declare(strict_types=1);

namespace TextProcessingKataTests;

use TextProcessingKata\TextProcessing;
use PHPUnit\Framework\TestCase;

class TextProcessingTest extends TestCase
{
    /** @test */
    public function should_return_one_word_when_give_one_word(): void
    {
        $textProcessing = new TextProcessing();

        $result = $textProcessing->analyse('one_word');

        self::assertSame($result, ['one_word']);
        self::assertSame(sizeof($result), 1);
    }

    /** @test */
    public function should_return_two_word_when_give_text_with_two_word(): void
    {
        $textProcessing = new TextProcessing();

        $result = $textProcessing->analyse('one_word two_word');

        self::assertSame($result, ['one_word', 'two_word']);
        self::assertSame(sizeof($result), 2);
    }

    /** @test */
    public function should_return_two_word_when_give_text_with_two_word_and_signs(): void
    {
        $textProcessing = new TextProcessing();

        $result = $textProcessing->analyse('one_word., .two_word');

        self::assertSame($result, ['one_word', 'two_word']);
        self::assertSame(sizeof($result), 2);
    }

    /** @test */
    public function should_return_two_word_when_give_text_with_two_word_and_repeat_one_more_time(): void
    {
        $textProcessing = new TextProcessing();

        $result = $textProcessing->analyse('one_word two_word one_word');

        self::assertSame($result, ['one_word', 'two_word']);
        self::assertSame(sizeof($result), 2);
    }
}
