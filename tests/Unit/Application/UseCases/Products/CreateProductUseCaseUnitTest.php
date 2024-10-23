<?php

declare(strict_types=1);

namespace Tests\Unit\Application\UseCases\Products;

use App\Application\UseCases\Products\CreateProductUseCase;
use App\Domain\Products\Entities\Product;
use App\Domain\Products\Services\CreateProductServiceInterface;
use App\Infrastructure\External\ConvertCurrencyInterface;
use Tests\Mothers\Products\ProductDTOMother;
use PHPUnit\Framework\TestCase;
use Tests\Mothers\Products\ProductMother;

class CreateProductUseCaseUnitTest extends TestCase
{
    public function test_invoke_success(): void
    {
        $convertCurrencyMock = $this->createMock(ConvertCurrencyInterface::class);
        $createProductServiceMock = $this->createMock(CreateProductServiceInterface::class);

        $convertCurrencyMock->expects($this->once())->method('__invoke')
            ->with(1.0)
            ->willReturn(93);

        $createProductServiceMock->expects($this->once())->method('__invoke')
            ->with($this->isInstanceOf(Product::class))
            ->willReturn(ProductMother::getLaptopProduct());

        $id = (new CreateProductUseCase(
            $createProductServiceMock,
            $convertCurrencyMock,
        ))(ProductDTOMother::getLaptopProductDTO());

        $this->assertSame(1, $id);
    }
}
