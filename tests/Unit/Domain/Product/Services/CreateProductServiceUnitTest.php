<?php

namespace Tests\Unit\Domain\Product\Services;

use App\Domain\Products\Repositories\ProductRepositoryInterface;
use App\Domain\Products\Services\CreateProductService;
use PHPUnit\Framework\TestCase;
use Tests\Mothers\Products\ProductMother;

class CreateProductServiceUnitTest extends TestCase
{
    public function test_invoke_success(): void
    {
        $productRepositoryMock = $this->createMock(ProductRepositoryInterface::class);

        $productRepositoryMock->expects($this->once())->method('create')
            ->with(ProductMother::getLaptopProduct())
            ->willReturn(ProductMother::getLaptopProduct());

        (new CreateProductService($productRepositoryMock))
            ->__invoke(ProductMother::getLaptopProduct());
    }
}
