<?php declare(strict_types=1);

namespace Integration\TextProcessingKataTests;

use TextProcessingKata\TextProcessing;
use PHPUnit\Framework\TestCase;

class TextProcessingTest extends TestCase
{
    protected $textProcessor;

    private const VALID_TEXT = 'Hello, this is an example for you to practice. You should grab this text and make it as your test case.';
    private const VALID_TEXT_WITH_MORE_SIGNS = 'Hello, this. is an example for you to practice. You, should grab this text, and make it as your test case.';
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
        $cleanedText = $this->textProcessor->analyse(self::VALID_TEXT);
        $orderWordsByRepeated = $this->textProcessor->orderText($cleanedText);

        self::assertTrue($orderWordsByRepeated[0] === self::MOST_REPEATED_WORD);
    }

    /** @test */
    public function should_return_the_most_repeated_word_with_more_signs(): void
    {
        $cleanedText = $this->textProcessor->analyse(self::VALID_TEXT_WITH_MORE_SIGNS);
        $orderWordsByRepeated = $this->textProcessor->orderText($cleanedText);

        self::assertTrue($orderWordsByRepeated[0] === self::MOST_REPEATED_WORD);
    }
}
