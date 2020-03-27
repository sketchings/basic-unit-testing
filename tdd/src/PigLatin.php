<?php

class PigLatin
{
    protected $digraphs = ['bl', 'br', 'ch', 'cl', 'cr', 'dr', 'fl', 'fr', 'gl', 'gr', 'pl', 'pr', 'sc', 'sh', 'sk', 'sl', 'sm', 'sn', 'sp', 'st', 'sw', 'th', 'tr', 'tw', 'wh', 'wr'];
    protected $trigraphs = ['sch', 'scr', 'shr', 'sph', 'spl', 'spr', 'squ', 'str', 'thr'];

    function convert($word)
    {
        $firstLetter = substr($word, 0, 1);
        $firstTwoLetters = substr($word, 0, 2);
        $firstThreeLetters = substr($word, 0, 3);

        if (in_array($firstThreeLetters, $this->trigraphs)) {
            $newWord = substr($word, 3);
            $newWord .= $firstThreeLetters . 'ay';
        } elseif (in_array($firstTwoLetters, $this->digraphs)) {
            $newWord = substr($word, 2);
            $newWord .= $firstTwoLetters . 'ay';
        } else {
            $newWord = substr($word, 1);
            $newWord .= $firstLetter . 'ay';
        }
        return $newWord;
    }
}
