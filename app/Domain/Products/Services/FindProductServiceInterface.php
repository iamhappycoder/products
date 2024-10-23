<?php

declare(strict_types=1);

namespace App\Domain\Products\Services;

use App\Domain\Products\Entities\Product;

interface FindProductServiceInterface
{
    public function __invoke(int $id): ?Product;
}
