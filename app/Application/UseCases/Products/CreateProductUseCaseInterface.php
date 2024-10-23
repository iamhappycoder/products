<?php

declare(strict_types=1);

namespace App\Application\UseCases\Products;
use App\Application\DTOs\ProductDTO;

interface CreateProductUseCaseInterface
{
    public function __invoke(ProductDTO $productDTO): int;
}

