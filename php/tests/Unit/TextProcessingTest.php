<?php declare(strict_types=1);

namespace Unit\TextProcessingKataTests;

use TextProcessingKata\TextProcessing;
use PHPUnit\Framework\TestCase;

class TextProcessingTest extends TestCase
{
    protected $textProcessor;

    private const VALID_TEXT = 'Hello, this. is an example for you to practice. You, should grab this text, and make it as your test case.';
    private const VALID_CLEANED_TEXT = 'hello this is an example for you to practice you should grab this text and make it as your test case';
    private const MOST_REPEATED_WORD = 'you';

    protected function setUp(): void
    {
        $this->textProcessor = new TextProcessing();
    }

    protected function tearDown(): void
    {
        $this->textProcessor = null;
    }

    /** @test */
    public function should_return_the_most_repeated_word(): void
    {
        $orderWordsByRepeated = $this->textProcessor->orderText(self::VALID_CLEANED_TEXT);
        self::assertTrue($orderWordsByRepeated[0] === self::MOST_REPEATED_WORD);
    }

    /** @test */
    public function should_cleaned_text(): void
    {
        $cleanedText = $this->textProcessor->analyse(self::VALID_TEXT);
        self::assertTrue($cleanedText === self::VALID_CLEANED_TEXT);
    }

    /** @test */
    public function should_return_words_repeated_in_order(): void
    {
        $orderWordsByRepeated = [
            0 => 'you',
            1 => 'this',
            2 => 'it',
        ];

        $expectedOutput = 'Those are the top 10 words used:\n\n1. you\n2. this\n3. it\n\nThe text has in total 3 words';
        $outputWordsInOrder = $this->textProcessor->outputWordsInOrder($orderWordsByRepeated);
        self::assertTrue($outputWordsInOrder === $expectedOutput);
    }
}
