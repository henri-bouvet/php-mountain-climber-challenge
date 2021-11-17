<?php

namespace Hackathon\LevelK;

class Brute
{
    private $hash;
    public $origin;
    private $method = array('md5','crc32','base64_encode','sha1'); // md5 - crc32 - base64 - sha1

    public function __construct($hash)
    {
        $this->hash = $hash;
    }

    private function comb($n)
    {
        if ($n > 0) {
            $tmp = array();
            $res = $this->comb($n - 1);
            foreach ($res as $e) {
                for ($j=0; $j < 26; $j++) {
                    array_push($tmp, $e.chr(ord('a') + $j));
                }
            }
            return $tmp;
        } else {
            return array('');
        }
    }

    /**
     * @TODO :
     *
     * Cette méthode essaye de trouver par la force à quel mot de 4 lettres correspond ce hash.
     * Sachant que nous ne connaissons pas le hash (enfin si... il suffit de regarder les commentaires de l'attribut privé $methode.
     */
    public function force()
    {
        $t = $this->comb(4);
        foreach ($this->method as $meth) {
            for ($i=0; $i < count($t); $i++) {
                if ($meth($t[$i]) == $this->hash) {
                    $this->origin = $t[$i];
                    return;
                }
            }
        }
    }
}
