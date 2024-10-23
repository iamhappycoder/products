<?php

declare(strict_types=1);

namespace App\Application\Services\Products;

use App\Domain\Products\Entities\Product;
use App\Domain\Products\Repositories\ProductRepositoryInterface;
use App\Domain\Products\Services\FindProductServiceInterface;

readonly class FindProductService implements FindProductServiceInterface
{
    public function __construct(
        private ProductRepositoryInterface $productRepository,
    ) {
    }

    public function __invoke(int $id): ?Product
    {
        return $this->productRepository->find($id);
    }
}
