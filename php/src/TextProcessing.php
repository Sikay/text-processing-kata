<?php declare(strict_types=1);

namespace TextProcessingKata;

class TextProcessing implements Processor
{
    private const CLEANER_SIGNS_REGEX = '/[^A-Za-z ]/';

    public function analyse(string $text): string
    {
        return preg_replace(self::CLEANER_SIGNS_REGEX, '', strtolower($text));
    }

    public function orderText(string $text): array
    {
        $wordsInText = array_count_values(explode(" ", $text));
        arsort($wordsInText);
        $wordsOrder = [];
        foreach ($wordsInText as $word => $repetitions) {
            array_push($wordsOrder, $word);
        }
        return $wordsOrder;
    }
}
