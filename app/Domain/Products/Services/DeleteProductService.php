<?php

declare(strict_types=1);

namespace App\Domain\Products\Services;

use App\Domain\Products\Entities\Product;
use App\Domain\Products\Repositories\ProductRepositoryInterface;

readonly class DeleteProductService implements DeleteProductServiceInterface
{
    public function __construct(
        private ProductRepositoryInterface $productRepository
    ) {
    }

    public function __invoke(Product $product): bool
    {
        return $this->productRepository->delete($product);
    }
}
