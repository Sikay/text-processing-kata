<?php declare(strict_types=1);

namespace Integration\TextProcessingKataTests;

use TextProcessingKata\TextProcessing;
use TextProcessingKata\OutputProcessing;
use PHPUnit\Framework\TestCase;

class TextProcessingTest extends TestCase
{
    private const VALID_TEXT = 'Hello, this is an example for you to practice. You should grab this text and make it as your test case.';
    private const VALID_TEXT_WITH_MORE_SIGNS = 'Hello, this. is an example for you to practice. You, should grab this text, and make it as your test case.';
    private const MOST_REPEATED_WORD = 'you';

    /** @test */
    public function should_return_the_most_repeated_word(): void
    {
        $textProcessor = new TextProcessing(self::VALID_TEXT);
        $orderWordsByRepeated = $textProcessor->orderText($textProcessor->text());

        self::assertTrue($orderWordsByRepeated[0] === self::MOST_REPEATED_WORD);
    }

    /** @test */
    public function should_return_the_most_repeated_word_with_more_signs(): void
    {
        $textProcessor = new TextProcessing(self::VALID_TEXT_WITH_MORE_SIGNS);
        $orderWordsByRepeated = $textProcessor->orderText($textProcessor->text());

        self::assertTrue($orderWordsByRepeated[0] === self::MOST_REPEATED_WORD);
    }

    /** @test */
    public function should_return_the_most_repeated_word_in_order(): void
    {
        $textProcessor = new TextProcessing(self::VALID_TEXT_WITH_MORE_SIGNS);
        $orderWordsByRepeated = $textProcessor->orderText($textProcessor->text());
        $outputProcessor = new OutputProcessing();
        $outputOrderWordsByRepeated = $outputProcessor->outputWordsInOrder($orderWordsByRepeated);

        $expectedOutput = 'Those are the top 10 words used:\n\n1. you\n2. this\n3. hello\n4. text\n5. test\n6. your\n7. as\n8. it\n9. make\n10. and\n\nThe text has in total 19 words';

        self::assertTrue($outputOrderWordsByRepeated === $expectedOutput);
    }
}
