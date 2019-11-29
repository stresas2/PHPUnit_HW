<?php declare(strict_types=1);

namespace App;

class NumberFormatter
{
    private $FormattedValue;

    public function format(float $inputValue): string
    {
        // Interval 999 500 ≤ x < ∞
        if (999500 <= $inputValue || -999500 >= $inputValue) {
            // Rule: (-)2444444 => (-)2.44M
            $this->FormattedValue = number_format($inputValue / 1000000, 2, '.', '') . 'M';
        }
        // Interval 99 950 ≤ x < 999 500
        elseif ((99500 <= $inputValue && 999500 > $inputValue) || (-99500 >= $inputValue && -999500 < $inputValue)) {
            // Rule: (-)535216 => (-)535K
            $this->FormattedValue = number_format($inputValue / 1000, 0, '.', '') . 'K';
        }
        // Interval 1 000 ≤ x < 99 950
        elseif ((1000 <= $inputValue && 99950 > $inputValue) || (-1000 >= $inputValue && -99950 < $inputValue)) {
            // Rule: (-)27533.78 => (-)27 534
            $this->FormattedValue = number_format($inputValue, 0, '.', ' ');
        }
        // Interval 0 ≤ x < 1 000
        elseif ((0 <= $inputValue && 1000 > $inputValue) || (0 > $inputValue && -1000 < $inputValue))
        {
            // Rule: (-)533.1 => (-)533.10
            $this->FormattedValue = number_format($inputValue, 2, '.', '');

            // If after point is two zeroes
            if (explode('.', $this->FormattedValue)[1] == '00') {
                // Rule: (-)12.00 => (-)12
                $this->FormattedValue = number_format($inputValue, 0, ',', '');

                //if it is just aproximaly 1000 add thousands seperate
                if (1000 == $this->FormattedValue || -1000 == $this->FormattedValue) {
                    $this->FormattedValue = number_format(floatval($this->FormattedValue), 0, '.', ' ');
                }
            }
        }
        return $this->FormattedValue;
    }
}
