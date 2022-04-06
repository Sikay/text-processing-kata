<?php declare(strict_types=1);

namespace Unit\TextProcessingKataTests;

use TextProcessingKata\OutputProcessing;
use PHPUnit\Framework\TestCase;

class OutputProcessingTest extends TestCase
{

    protected function setUp(): void
    {
        $this->outputProcessor = new OutputProcessing();
    }

    protected function tearDown(): void
    {
        $this->outputProcessor = null;
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
        $outputWordsInOrder = $this->outputProcessor->outputTopWords($orderWordsByRepeated);
        self::assertTrue($outputWordsInOrder === $expectedOutput);
    }

    /** @test */
    public function should_return_the_top_10_words_repeated_in_order(): void
    {
        $orderWordsByRepeated = [
            0 => 'you',
            1 => 'this',
            2 => 'it',
            3 => 'your',
            4 => 'to',
            5 => 'text',
            6 => 'test',
            7 => 'should',
            8 => 'practice',
            9 => 'make',
            10 => 'case',
            11 => 'hello',
        ];

        $expectedOutput = 'Those are the top 10 words used:\n\n1. you\n2. this\n3. it\n4. your\n5. to\n6. text\n7. test\n8. should\n9. practice\n10. make\n\nThe text has in total 12 words';
        $outputWordsInOrder = $this->outputProcessor->outputTopWords($orderWordsByRepeated);
        var_dump($outputWordsInOrder);
        self::assertTrue($outputWordsInOrder === $expectedOutput);
    }
}
