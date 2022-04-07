<?php declare(strict_types=1);

namespace TextProcessingKata;

class TextProcessing implements Processor
{
    private const CLEANER_SIGNS_REGEX = '/[^A-Za-z ]/';
    private const CLEANER_CODE_SNIPPETS_REGEX = '/`[\s\S]+?`/';
    private $text;

    public function __construct(string $text) {
        $this->text = $this->analyse($text);
    }

    public function analyse(string $text): string
    {
        $textWithoutCodeSnippets = preg_replace(self::CLEANER_CODE_SNIPPETS_REGEX, '', strtolower($text));
        $textWithoutSigns = preg_replace(self::CLEANER_SIGNS_REGEX, '', strtolower($textWithoutCodeSnippets));
        return trim($textWithoutSigns);
    }

    public function text(): string
    {
        return $this->text;
    }

    public function count(): int
    {
        return str_word_count($this->text, 0);
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
