<?php

declare(strict_types=1);

namespace App\Application\UseCases\Products;

use App\Application\Transformers\ProductTransformer;
use App\Domain\Products\Services\FindCategoryServiceInterface;
use App\Domain\Products\Services\FindProductByCategoryServiceInterface;

readonly class ListProductsUseCase implements ListProductsUseCaseInterface
{
    public function __construct(
       private FindCategoryServiceInterface $findCategoryService,
       private FindProductByCategoryServiceInterface $findProductByCategoryService,
    ) {
    }

    /**
     * @inheritdoc
     */
    public function __invoke(int $categoryId): array
    {
        $products = [];

        $category = ($this->findCategoryService)($categoryId);

        if ($category) {
            $products = ($this->findProductByCategoryService)($category);
        }

        return ProductTransformer::toProductDTOList($products);
    }
}
