<?php

declare(strict_types=1);

namespace App\Domain\Products\Services;

use App\Domain\Products\Entities\Product;

interface DeleteProductServiceInterface
{
    public function __invoke(Product $product): bool;
}
