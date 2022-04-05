<?php declare(strict_types=1);

namespace TextProcessingKata;

class TextProcessing implements Processor
{
    public function analyse(string $text): string
    {
        $wordsInText = array_count_values(explode(" ", strtolower($text)));
        arsort($wordsInText);
        $wordsOrder = [];
        foreach ($wordsInText as $word => $repetitions) {
            array_push($wordsOrder, $word);
        }
        return $wordsOrder[0];
    }
}
