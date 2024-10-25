<?php

declare(strict_types=1);

namespace App\Domain\Products\Services;

use App\Domain\Products\Entities\Category;

interface FindCategoryServiceInterface
{
    public function __invoke(int $id): ?Category;
}
