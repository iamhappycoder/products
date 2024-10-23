<?php

namespace Tests\Unit\Application\Services\Products;

use App\Application\Services\Products\FindProductByCategoryService;
use App\Domain\Products\Entities\Category;
use App\Infrastructure\Repositories\Products\ProductRepository;
use Tests\Mothers\Products\CategoryMother;
use Tests\TestCase;

class FindProductByCategoryServiceUnitTest extends TestCase
{
    public function test_invoke_success(): void
    {
        $productRepositoryMock = $this->createMock(ProductRepository::class);

        $productRepositoryMock->expects($this->once())->method('findByCategory')
            ->with($this->isInstanceOf(Category::class))
            ->willReturn(['products-list']);

        $products = (new FindProductByCategoryService($productRepositoryMock))
            ->__invoke(CategoryMother::getElectronicsCategory());

        $this->assertEquals(['products-list'], $products);
    }
}
