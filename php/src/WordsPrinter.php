<?php

namespace TextProcessingKata;

class WordsPrinter
{

    public function print(array $words): string
    {
        $body = '';
        $label = 1;
        foreach ($words as $word) {
            $body .= $label . '. ' . $word;

            if (sizeof($words) > $label) {
                $body .= PHP_EOL;
            }

            $label++;
        }

        return $body;
    }
}
