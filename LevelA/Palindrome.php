<?php

namespace Hackathon\LevelA;

class Palindrome
{
    private $str;

    public function __construct($str)
    {
        $this->str = $str;
    }

    /**
     * This function creates a palindrome with his $str attributes
     * If $str is abc then this function return abccba
     *
     * @TODO
     * @return string
     */
    public function generatePalindrome()
    {
        $res = $this->str;
        for ($i = mb_strlen($this->str); $i>=0; $i--) {
            $res .= mb_substr($this->str, $i, 1);
        }
        return $res;
    }

}
