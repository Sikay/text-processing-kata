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
}
