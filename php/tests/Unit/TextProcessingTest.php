<?php declare(strict_types=1);

namespace Unit\TextProcessingKataTests;

use TextProcessingKata\TextProcessing;
use PHPUnit\Framework\TestCase;

class TextProcessingTest extends TestCase
{
    private const VALID_TEXT = 'Hello, this. is an example for you to practice. You, should grab this text, and make it as your test case.';
    private const VALID_CLEANED_TEXT = 'hello this is an example for you to practice you should grab this text and make it as your test case';
    private const MOST_REPEATED_WORD = 'you';
    private const TEXT_WITH_CODE_SNIPPETS = 'Hello, this is an example for you to practice. You should grab this text and make it as your test case:
                                                ` ` `javascript
                                                if (true) {
                                                console.log("should should should")
                                                }
                                                ` ` `';

    /** @test */
    public function should_return_the_most_repeated_word(): void
    {
        $textProcessor = new TextProcessing(self::VALID_CLEANED_TEXT);
        $orderWordsByRepeated = $textProcessor->order();
        self::assertTrue($orderWordsByRepeated[0] === self::MOST_REPEATED_WORD);
    }

    /** @test */
    public function should_cleaned_text(): void
    {
        $textProcessor = new TextProcessing(self::VALID_TEXT);
        self::assertTrue($textProcessor->text() === self::VALID_CLEANED_TEXT);
    }

    /** @test */
    public function should_cleaned_text_with_code_snippets(): void
    {
        $textProcessor = new TextProcessing(self::TEXT_WITH_CODE_SNIPPETS);
        self::assertTrue($textProcessor->text() === self::VALID_CLEANED_TEXT);
    }

    /** @test */
    public function should_return_total_words(): void
    {
        $textProcessor = new TextProcessing(self::VALID_TEXT);
        self::assertTrue($textProcessor->count() === 21);
    }
}
