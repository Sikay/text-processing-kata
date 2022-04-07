<?php declare(strict_types=1);

namespace Integration\TextProcessingKataTests;

use TextProcessingKata\TextProcessing;
use TextProcessingKata\OutputProcessing;
use PHPUnit\Framework\TestCase;

class TextProcessingTest extends TestCase
{
    private const VALID_TEXT = 'Hello, this is an example for you to practice. You should grab this text and make it as your test case.';
    private const VALID_TEXT_WITH_MORE_SIGNS = 'Hello, this. is an example for you to practice. You, should grab this text, and make it as your test case.';
    private const TEXT_WITH_CODE_SNIPPETS = 'Hello, this is an example for you to practice. You should grab this text and make it as your test case:
        ` ` `javascript
        if (true) {
        console.log("should should should")
        }
        ` ` `';

    /** @test */
    public function should_return_the_most_repeated_word_in_order(): void
    {
        $textProcessor = new TextProcessing(self::VALID_TEXT_WITH_MORE_SIGNS);
        $outputProcessor = new OutputProcessing();
        $outputOrderWordsByRepeated = $outputProcessor->outputTopWords($textProcessor->order(), $textProcessor->count());

        $expectedOutput = 'Those are the top 10 words used:\n\n1. you\n2. this\n3. hello\n4. text\n5. test\n6. your\n7. as\n8. it\n9. make\n10. and\n\nThe text has in total 21 words';

        self::assertTrue($outputOrderWordsByRepeated === $expectedOutput);
    }

    /** @test */
    public function should_return_the_most_repeated_word_in_order_with_code_snippets_text(): void
    {
        $textProcessor = new TextProcessing(self::TEXT_WITH_CODE_SNIPPETS);
        $outputProcessor = new OutputProcessing();
        $outputOrderWordsByRepeated = $outputProcessor->outputTopWords($textProcessor->order(), $textProcessor->count());

        $expectedOutput = 'Those are the top 10 words used:\n\n1. you\n2. this\n3. hello\n4. text\n5. test\n6. your\n7. as\n8. it\n9. make\n10. and\n\nThe text has in total 21 words';

        self::assertTrue($outputOrderWordsByRepeated === $expectedOutput);
    }
}
