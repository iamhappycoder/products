<?php

declare(strict_types=1);

namespace App\Infrastructure\External;

class ConvertCurrency implements ConvertCurrencyInterface
{
    public function __invoke(float $amount, string $fromCurrency, string $toCurrency,): int
    {
        // Hardcoded logic
        $convertedAmount = $amount * 0.93;

        $scalingFactor = $this->getScalingFactor($convertedAmount);

        return (int)($convertedAmount * $scalingFactor);
    }

    public function getScalingFactor(float $amount): int
    {
        $amountStr = (string)$amount;
        $decimalPlaces = 0;

        if (str_contains($amountStr, '.')) {
            $parts = explode('.', $amountStr);
            $decimalPlaces = strlen($parts[1]);
        }

        return pow(10, $decimalPlaces);
    }
}
