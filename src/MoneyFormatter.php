<?php declare(strict_types=1);

namespace App;

class MoneyFormatter
{
    public function EurFormatter(string $amount): string
    {
        return $amount .' €';
    }

    public function DollarFormatter(string $amount): string
    {
        return '$ ' . $amount;
    }
}

