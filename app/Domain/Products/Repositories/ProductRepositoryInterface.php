<?php

declare(strict_types=1);

namespace App\Domain\Products\Repositories;

use App\Domain\Products\Entities\Category;
use App\Domain\Products\Entities\Product;

interface ProductRepositoryInterface
{
    public function find(int $id): ?Product;
    public function findByCategory(Category $category): array;
    public function create(Product $product): Product;
    public function update(Product $product): Product;
    public function delete(Product $product): bool;
}
