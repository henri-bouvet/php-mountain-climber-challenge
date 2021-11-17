<?php

namespace Hackathon\LevelC;

class RotationString
{
    /**
     * @TODO ! BAM
     *
     * @param $s1
     * @param $s2
     *
     * @return bool|int
     */
    public static function isRotation($s1, $s2)
    {
        /** @TODO */
        $s1copy = $s1;
        for ($i = 0; $i < strlen($s1); $i++) {
            if (strcmp($s1copy, $s2) == 0) {
                return true;
            }
            $tmp = $s1copy[0];

            for ($j = 0; $j < strlen($s1) - 1; $j++) {
                $s1copy[$j] = $s1copy[$j + 1];
            }
            $s1copy[strlen($s1) - 1] = $tmp;
        }
        return false;
    }

    public static function isSubString($s1, $s2)
    {
        $pos = strpos($s1, $s2);

        return $pos;
    }
}
