<?php


declare(strict_types=1);

namespace App\Application\Services\Products;

use App\Domain\Products\Entities\Product;
use App\Domain\Products\Repositories\ProductRepositoryInterface;
use App\Domain\Products\Services\CreateProductServiceInterface;

readonly class UpdateProductService implements CreateProductServiceInterface
{
    public function __construct(
        private ProductRepositoryInterface $productRepository
    ) {
    }

    public function __invoke(Product $product): Product
    {
        return $this->productRepository->update($product);
    }
}
