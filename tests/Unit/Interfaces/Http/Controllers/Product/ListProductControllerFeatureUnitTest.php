<?php

namespace Tests\Unit\Interfaces\Http\Controllers\Product;

use App\Application\UseCases\Products\ListProductsUseCaseInterface;
use App\Interfaces\Http\Controllers\Product\ListProductsController;
use App\Interfaces\Http\Requests\Product\ListProductRequest;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use PHPUnit\Framework\TestCase;
use Tests\Mothers\Products\ProductDTOMother;

class ListProductControllerFeatureUnitTest extends TestCase
{
    public function test_invoke_success(): void
    {
        $listProductUseCase = $this->createMock(ListProductsUseCaseInterface::class);
        $listProductUseCase->expects($this->once())->method('__invoke')
            ->with(1)
            ->willReturn([ProductDTOMother::class]);

        $listProductRequest = new ListProductRequest(['categoryId' => 1]);
        $resource = (new ListProductsController($listProductUseCase))
            ->__invoke($listProductRequest);

        $this->assertInstanceOf(AnonymousResourceCollection::class, $resource);
    }
}
