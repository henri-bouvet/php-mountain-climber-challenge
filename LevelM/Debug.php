<?php

namespace Hackathon\LevelM;

class Debug
{
    public $token;

    public function __construct($token)
    {
        $this->token = $token;
    }

    /** Cette fonction retourne le deuxième élèment de la liste */
    public function myList()
    {
        list($a, $b, $c, $d) = array(1, 2, 3, 4);

        return array(
                'return' => $b,
                'cheat' => $this->token,
            );
    }

    /** Cette fonction retourne vrai si array1 est égale à array2
     mais peu importe l'ordre des tableaux */
    public function myArraysAreEquals()
    {
        $array1 = array(
            'foo' => 'foo',
            'bar' => 'bar',
            'token' => $this->token,
        );

        $array2 = array(
            'token' => $this->token,
            'bar' => 'bar',
            'foo' => 'foo',
        );

        return array(
            'return' => $array1 == $array2,
            'cheat' => $array1['token'],
        );
    }

    /** Il n'y a rien à faire ici... juste à lire pour le fun
     Ici, nous avons FALSE == TRUE */
    public function trueEqualsFalse()
    {
        $a = 0;
        $b = 'x';

        $testa = (false == $a) ? true : false;
        $testb = ($a != $b) ? true : false;
        $testc = ($b == true) ? true : false;

        return $testa && $testb && $testc;
    }

    /** Ici nous avons un element et nous retournons le suivant
     Uniquement des valeurs scalaires */
    public function increment($a)
    {
        if (is_string($a)) {
            $l = strlen($a);
            return substr($a, 0, $l - 1).chr(ord($a[$l - 1]) + 1);
        }
        return ++$a;
    }
}
