<?php

namespace Tests\Unit\Infrastructure\External;

use App\Infrastructure\External\ConvertCurrency;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

class ConvertCurrencyUnitTest extends TestCase
{
    #[DataProvider('dataProviderAmount')]
    public function test_invoke_success(float $amount, $expected): void
    {
        $priceInCents = (new ConvertCurrency())->__invoke($amount, 'USD', 'EUR');

        $this->assertEquals($expected, $priceInCents);
    }

    public static function dataProviderAmount(): array
    {
        return [
            'no decimal places' => [1, 93],
            'one decimal place with zero value' => [1.0, 93],
            'one decimal place' => [1.2, 1116],
            'two decimal places' => [1.23, 11439],
            'three decimal places' => [1.234, 114762],
        ];
    }
}
