<?php

declare(strict_types=1);

namespace App\Interfaces\Http\Controllers\Product;

use App\Application\UseCases\Products\ListProductsUseCaseInterface;
use App\Interfaces\Api\Resources\Product\ProductResource;
use App\Interfaces\Http\Requests\Product\ListProductRequest;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

readonly class ListProductsController
{
    public function __construct(
        private ListProductsUseCaseInterface $listProductsUseCase,
    ) {
    }

    public function __invoke(ListProductRequest $listProductRequest): AnonymousResourceCollection
    {
        $categoryId = (int)$listProductRequest->query(ListProductRequest::CATEGORY_ID);

        $products = ($this->listProductsUseCase)($categoryId);

        return ProductResource::collection($products);
    }
}
