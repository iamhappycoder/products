<?php

declare(strict_types=1);

namespace Tests\Unit\Application\UseCases\Products;

use App\Application\UseCases\Products\DeleteProductUseCase;
use App\Domain\Products\Entities\Product;
use App\Domain\Products\Services\DeleteProductServiceInterface;
use App\Infrastructure\External\ConvertCurrencyInterface;
use Tests\Mothers\Products\ProductDTOMother;
use PHPUnit\Framework\TestCase;

class DeleteProductUseCaseUnitTest extends TestCase
{
    public function test_invoke_success(): void
    {
        $convertCurrencyMock = $this->createMock(ConvertCurrencyInterface::class);
        $deleteProductServiceMock = $this->createMock(DeleteProductServiceInterface::class);

        $convertCurrencyMock->expects($this->once())->method('__invoke')
            ->with(1.0, 'USD', 'EUR')
            ->willReturn(93);

        $deleteProductServiceMock->expects($this->once())->method('__invoke')
            ->with($this->isInstanceOf(Product::class));

        (new DeleteProductUseCase(
            $deleteProductServiceMock,
            $convertCurrencyMock,
        ))(ProductDTOMother::getLaptopProductDTO());
    }
}
