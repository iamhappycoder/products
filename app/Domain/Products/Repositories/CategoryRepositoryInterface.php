<?php

declare(strict_types=1);

namespace App\Domain\Products\Repositories;

use App\Domain\Products\Entities\Category;

interface CategoryRepositoryInterface
{
    public function find(int $id): ?Category;
    public function create(Category $category): Category;
    public function update(Category $category): Category;
    public function delete(Category $category): bool;
}
