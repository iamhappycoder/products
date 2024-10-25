<?php

declare(strict_types=1);

namespace App\Domain\Products\Services;

use App\Domain\Products\Entities\Category;
use App\Domain\Products\Repositories\CategoryRepositoryInterface;

readonly class FindCategoryService implements FindCategoryServiceInterface
{
    public function __construct(
        private CategoryRepositoryInterface $categoryRepository
    ) {
    }

    public function __invoke(int $id): ?Category
    {
        return $this->categoryRepository->find($id);
    }
}
