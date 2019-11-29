<?php

use App\NumberFormatter;
use PHPUnit\Framework\TestCase;

class NumberFormatterTest extends TestCase
{
    /**
     * @dataProvider inputAndOutputProvider
     * @param $input
     * @param $expectedOutput
     */
    public function testNumberFormat($input, $expectedOutput)
    {
        $numberFormatterClass = new NumberFormatter();

        $this->assertSame($expectedOutput, $numberFormatterClass->format($input));
    }

    public function inputAndOutputProvider(): array
    {
        return [

            // Interval 999 500 ≤ x < ∞

                // Rule: (-)2444444 => (-)2.44M
                '1 test positive' => [2444444, '2.44M'],
                '1 test negative' => [-2444444, '-2.44M'],
                // Rule: (-)2999500 => (-)3.00M
                '2 test positive' => [2999500, '3.00M'],
                '3 test negative' => [-2999500, '-3.00M'],

            // Interval 99 950 ≤ x < 999 500

                // Rule: (-)535216 => (-)535K
                '4 test positive' => [535216, '535K'],
                '4 test negative' => [-535216, '-535K'],
                // Rule: (-)99950 => (-)100K
                '5 test positive' => [99950, '100K'],
                '5 test negative' => [-99950, '-100K'],

            // Interval 1 000 ≤ x < 99 950

                // Rule: (-)27533.78 => (-)27 534
                '6 test positive' => [27533.78, '27 534'],
                '6 test negative' => [-27533.78, '-27 534'],
                // Rule: (-)999.99 => (-)999.99
                '7 test positive' => [999.99, '999.99'],
                '7 test negative' => [-999.99, '-999.99'],
                // Rule: (-)999.9999 => (-)1 000
                '8 test positive' => [999.9999, '1 000'],
                '8 test negative' => [-999.9999, '-1 000'],

            // Interval 0 ≤ x < 1 000

                // Rule: (-)533.1 => (-)533.10
                '9 test positive' => [533.1, '533.10'],
                '9 test negative' => [-533.1, '-533.10'],
                // Rule: (-)66.6666 => (-)66.67
                '10 test positive' => [66.6666, '66.67'],
                '10 test negative' => [-66.6666, '-66.67'],
                // Rule: (-)12.00 => (-)12
                '11 test positive' => [12.00, '12'],
                '11 test negative' => [-12.00, '-12']
        ];
    }
}
