<?php

declare(strict_types=1);

namespace App\Infrastructure\External;

interface ConvertCurrencyInterface
{
    public function __invoke(
        float $amount,
        string $fromCurrency,
        string $toCurrency,
    ): int;
}
