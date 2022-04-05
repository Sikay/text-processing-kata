<?php declare(strict_types=1);

namespace TextProcessingKata;

interface Processor {
   public function analyse(string $text): string;
}
