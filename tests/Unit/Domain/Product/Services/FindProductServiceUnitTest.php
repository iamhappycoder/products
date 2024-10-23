<?php

namespace Tests\Unit\Domain\Product\Services;

use App\Domain\Products\Services\FindProductService;
use App\Infrastructure\Repositories\Products\ProductRepository;
use Tests\Mothers\Products\ProductMother;
use Tests\TestCase;

class FindProductServiceUnitTest extends TestCase
{
    public function test_invoke_success(): void
    {
        $productRepositoryMock = $this->createMock(ProductRepository::class);

        $productRepositoryMock->expects($this->once())->method('find')
            ->with(1)
            ->willReturn(ProductMother::getLaptopProduct());

        $product = (new FindProductService($productRepositoryMock))
            ->__invoke(1);

        $this->assertEquals(ProductMother::getLaptopProduct(), $product);
    }
}
