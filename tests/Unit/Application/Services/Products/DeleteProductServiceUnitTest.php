<?php

namespace Tests\Unit\Application\Services\Products;

use App\Application\Services\Products\DeleteProductService;
use App\Domain\Products\Entities\Product;
use App\Domain\Products\Repositories\ProductRepositoryInterface;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use PHPUnit\Framework\TestCase;
use Tests\Mothers\Products\ProductMother;

class DeleteProductServiceUnitTest extends TestCase
{
    public function test_invoke_failure_exception_thrown(): void
    {
        $repositoryMock = $this->createMock(ProductRepositoryInterface::class);

        $this->expectException(ModelNotFoundException::class);

        $repositoryMock->expects($this->once())->method('delete')
            ->willThrowException(new ModelNotFoundException());

        (new DeleteProductService($repositoryMock))
            ->__invoke(ProductMother::getLaptopProduct());
    }

    public function test_invoke_failure_not_deleted(): void
    {
        $repositoryMock = $this->createMock(ProductRepositoryInterface::class);

        $repositoryMock->expects($this->once())->method('delete')
            ->with($this->isInstanceOf(Product::class))
            ->willReturn(false);

        $deleted = (new DeleteProductService($repositoryMock))
            ->__invoke(ProductMother::getLaptopProduct());

        $this->assertFalse($deleted);
    }

    public function test_invoke_success(): void
    {
        $repositoryMock = $this->createMock(ProductRepositoryInterface::class);
        $repositoryMock->expects($this->once())->method('delete')
            ->with($this->isInstanceOf(Product::class))
            ->willReturn(true);

        $deleted = (new DeleteProductService($repositoryMock))
            ->__invoke(ProductMother::getLaptopProduct());

        $this->assertTrue($deleted);
    }
}
