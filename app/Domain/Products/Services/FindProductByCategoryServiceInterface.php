<?php

declare(strict_types=1);

namespace App\Domain\Products\Services;

use App\Domain\Products\Entities\Category;

interface FindProductByCategoryServiceInterface
{
    public function __invoke(Category $category): array;
}
