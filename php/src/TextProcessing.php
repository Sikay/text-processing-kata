<?php declare(strict_types=1);

namespace TextProcessingKata;

class TextProcessing implements Processor
{
    private const CLEANER_SIGNS_REGEX = '/[^A-Za-z ]/';
    private $text;

    public function __construct(string $text) {
        $this->text = $this->analyse($text);
    }

    public function analyse(string $text): string
    {
        return preg_replace(self::CLEANER_SIGNS_REGEX, '', strtolower($text));
    }

    public function text()
    {
        return $this->text;
    }

    public function order(): array
    {
        $wordsInText = array_count_values(explode(" ", $this->text));
        arsort($wordsInText);
        $wordsOrder = [];
        foreach ($wordsInText as $word => $repetitions) {
            array_push($wordsOrder, $word);
        }
        return $wordsOrder;
    }
}
