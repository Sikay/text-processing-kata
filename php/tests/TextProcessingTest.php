<?php declare(strict_types=1);

namespace TextProcessingKataTests;

use TextProcessingKata\TextProcessing;
use PHPUnit\Framework\TestCase;

class TextProcessingTest extends TestCase
{
    public function textProvider(): iterable
    {
        yield ['one_word', ['one_word'], 1];
        yield ['one_word two_word', ['one_word', 'two_word'], 2];
        yield ['one_word., .two_word', ['one_word', 'two_word'], 2];
        yield ['one_word two_word one_word', ['one_word', 'two_word'], 3];
        yield ['one_word two_word two_word', ['two_word', 'one_word'], 3];
        yield ['one_word two_word TWO_word', ['two_word', 'one_word'], 3];
    }

    /**
     * @test
     * @dataProvider textProvider
     */
    public function should_return_top_word_when_give_text(string $text, array $expectedWords, int $totalWords): void
    {
        $textProcessing = new TextProcessing();

        $words = $textProcessing->analyse($text);

        self::assertSame($words->topWords(), $expectedWords);
        self::assertSame($words->totalWords(), $totalWords);
    }
}
