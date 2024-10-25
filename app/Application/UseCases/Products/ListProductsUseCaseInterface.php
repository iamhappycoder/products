<?php

declare(strict_types=1);

namespace App\Application\UseCases\Products;

use App\Application\DTOs\ProductDTO;

interface ListProductsUseCaseInterface
{
    /**
     * @return ProductDTO[]
     */
    public function __invoke(int $categoryId): array;
}
