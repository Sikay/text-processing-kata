<?php declare(strict_types=1);

namespace TextProcessingKata;

class OutputProcessing
{
    public function outputWordsInOrder(array $orderWords): string
    {
        $maxOutputWords = 10;
        $output = '';
        $countWord = 1;
        foreach ($orderWords as $key => $word) {
            if ($countWord <= $maxOutputWords) {
                $output .= $countWord . '. ' . $word . '\n';
            }
            $countWord++;
        }
        return 'Those are the top 10 words used:\n\n' . $output . '\nThe text has in total ' . sizeof($orderWords) . ' words';
    }
}
