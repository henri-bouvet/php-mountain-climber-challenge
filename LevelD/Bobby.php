<?php

namespace Hackathon\LevelD;

class Bobby
{
    public $wallet = array();
    public $total;

    public function __construct($wallet)
    {
        $this->wallet = $wallet;
        $this->computeTotal();
    }

    /**
     * @TODO
     *
     * @param $price
     *
     * @return bool|int|string
     */
    public function giveMoney($price)
    {
        /** @TODO */
        $this->computeTotal();
        if ($this->total < $price) {
            return false;
        }
        $histo = array_fill(0, count($this->wallet), false);
        while ($price > 0) {
            $ind = $this->getNextMaxIndex($this->wallet, $histo);
            if ($ind === -1) {
                return false;
            }
            $histo[$ind] = true;
            $price -= $this->wallet[$ind];
        }
        $new_wallet = array();

        for ($i = 0; $i < count($histo); $i++) {
            if (!$histo[$i]) {
                array_push($new_wallet, $this->wallet[$i]);
            }
        }
        $this->wallet = $new_wallet;
        $this->computeTotal();
        return true;
    }

    public function getNextMaxIndex($arr, $histo)
    {
        $maxIndex = -1;
        $max = null;
        for ($i = 0; $i < count($arr); $i++) {
            if ((!is_numeric($arr[$i])) || ($histo[$i])) {
                continue;
            }
            if ($max === null || $arr[$i] > $max) {
                $max = $arr[$i];
                $maxIndex = $i;
            }
        }

        return $maxIndex;
    }

    /**
     * This function updates the amount of your wallet
     */
    private function computeTotal()
    {
        $this->total = 0;

        foreach ($this->wallet as $element) {
            if (is_numeric($element)) {
                $this->total += $element;
            }
        }
    }
}
