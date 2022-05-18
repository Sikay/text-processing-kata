<?php

namespace TextProcessingKata;

class WordsPrinter
{

    public function print(array $words): string
    {
        $body = '';
        $label = 1;
        foreach ($words as $word) {
            if ($label <= 10) {
                $body .= $label . '. ' . $word;
            }

            if (sizeof($words) > $label && $label < 10) {
                $body .= PHP_EOL;
            }

            $label++;
        }

        return $body;
    }
}
