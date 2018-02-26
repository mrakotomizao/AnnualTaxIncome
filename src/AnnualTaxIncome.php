<?php

namespace TestTdd;

class AnnualTaxIncome
{
    private $level = array(50000000, 250000000, 500000000);
    private $percentTax = array(5, 15, 25, 30);

    public function calculateTax($income)
    {
        $result = null;
        if (is_numeric($income)) {
            $breakValueForTax = $this->breakValueForTax($income);

            for ($j = 0; $j < count($breakValueForTax); $j++) {
                $result += ($breakValueForTax[$j] * ($this->percentTax[$j] / 100));
            }
        }
        return $result;
    }

    private function breakValueForTax($amount)
    {
        $explodedValue = [];

        for ($i = 0; $i < count($this->level); $i++) {
            if (($amount - $this->level[$i]) >= 0) {
                if ($i > 0 && $i < count($this->level)) {
                    $explodedValue[$i] = $this->level[$i] - $this->level[$i - 1];
                    $amount -= ($this->level[$i] - $this->level[$i - 1]);
                } else {
                    $explodedValue[$i] = $this->level[$i];
                    $amount -= $this->level[$i];
                }
            } else {
                $explodedValue[$i] = $amount;
                $amount = 0;
                break;
            }
        }

        $explodedValue[count($explodedValue)] = $amount;

        return $explodedValue;
    }
}