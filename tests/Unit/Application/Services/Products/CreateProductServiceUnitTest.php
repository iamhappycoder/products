<?php

namespace Tests\Unit\Application\Services\Products;

use App\Application\Services\Products\CreateProductService;
use App\Domain\Products\Repositories\ProductRepositoryInterface;
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
