<?php declare(strict_types=1);

namespace TextProcessingKataTests;

use TextProcessingKata\TextProcessing;
use PHPUnit\Framework\TestCase;

class TextProcessingTest extends TestCase
{
    /** @test */
    public function give_me_a_good_name_please(): void
    {
        $xxx = new TextProcessing();

        $result = $xxx->theMethod();

        self::assertEquals(true, $result);
    }
}
