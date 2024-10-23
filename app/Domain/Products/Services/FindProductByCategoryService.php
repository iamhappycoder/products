<?php

declare(strict_types=1);

namespace App\Domain\Products\Services;

use App\Domain\Products\Entities\Category;
use App\Domain\Products\Repositories\ProductRepositoryInterface;

readonly class FindProductByCategoryService implements FindProductByCategoryServiceInterface
{
    public function __construct(
        private ProductRepositoryInterface $productRepository
    ){
    }

    public function __invoke(Category $category): array
    {
        return $this->productRepository->findByCategory($category);
    }
}
