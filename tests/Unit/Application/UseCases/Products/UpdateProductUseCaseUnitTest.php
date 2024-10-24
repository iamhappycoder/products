<?php

declare(strict_types=1);

namespace Tests\Unit\Application\UseCases\Products;

use App\Application\UseCases\Products\UpdateProductUseCase;
use App\Domain\Products\Entities\Product;
use App\Domain\Products\Services\UpdateProductServiceInterface;
use App\Infrastructure\External\ConvertCurrencyInterface;
use Tests\Mothers\Products\ProductDTOMother;
use PHPUnit\Framework\TestCase;
use Tests\Mothers\Products\ProductMother;

class UpdateProductUseCaseUnitTest extends TestCase
{
    public function test_invoke_success(): void
    {
        $convertCurrencyMock = $this->createMock(ConvertCurrencyInterface::class);
        $updateProductServiceMock = $this->createMock(UpdateProductServiceInterface::class);

        $convertCurrencyMock->expects($this->once())->method('__invoke')
            ->with(1.0, 'USD', 'EUR')
            ->willReturn(93);

        $updateProductServiceMock->expects($this->once())->method('__invoke')
            ->with($this->isInstanceOf(Product::class))
            ->willReturn(ProductMother::getLaptopProduct());

        (new UpdateProductUseCase(
            $updateProductServiceMock,
            $convertCurrencyMock,
        ))(ProductDTOMother::getLaptopProductDTO());
    }
}
