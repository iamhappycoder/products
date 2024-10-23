<?php

namespace Tests\Unit\Domain\Product\Services;

use App\Domain\Products\Entities\Product;
use App\Domain\Products\Repositories\ProductRepositoryInterface;
use App\Domain\Products\Services\UpdateProductService;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use PHPUnit\Framework\TestCase;
use Tests\Mothers\Products\ProductMother;

class UpdateProductServiceUnitTest extends TestCase
{
    public function test_invoke_failure(): void
    {
        $productRepositoryMock = $this->createMock(ProductRepositoryInterface::class);

        $this->expectException(ModelNotFoundException::class);

        $productRepositoryMock->expects($this->once())->method('update')
            ->willThrowException(new ModelNotFoundException());

        (new UpdateProductService($productRepositoryMock))
            ->__invoke(ProductMother::getLaptopProduct());
    }

    public function test_invoke_success(): void
    {
        $productRepositoryMock = $this->createMock(ProductRepositoryInterface::class);

        $productRepositoryMock->expects($this->once())->method('update')
            ->with($this->isInstanceOf(Product::class))
            ->willReturn(ProductMother::getLaptopProduct());

        (new UpdateProductService($productRepositoryMock))
            ->__invoke(ProductMother::getLaptopProduct());
    }
}
