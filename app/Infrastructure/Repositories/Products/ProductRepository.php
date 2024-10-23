<?php

declare(strict_types=1);

namespace App\Infrastructure\Repositories\Products;

use App\Domain\Products\Entities\Category;
use App\Domain\Products\Entities\Product;
use App\Domain\Products\Repositories\ProductRepositoryInterface;
use App\Infrastructure\Persistence\Products\ProductModel;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ProductRepository implements ProductRepositoryInterface
{
    public function find(int $id): ?Product
    {
        $productModel = ProductModel::find($id);

        return $productModel ? $productModel->toEntity() : null;
    }

    public function findByCategory(Category $category): array
    {
        $productModels = ProductModel::where('category_id', $category->id)->get();

        return array_map(fn($model) => new Product(...array_values($model)), $productModels->toArray());
    }

    public function create(Product $product): Product
    {
        $productModel = ProductModel::fromEntity($product);
        $productModel->save();

        return $productModel->toEntity();
    }

    public function update(Product $product): Product
    {
        $productModel = ProductModel::find($product->id);
        if (!$productModel) {
            throw new ModelNotFoundException("Product not found.");
        }

        $productModel->fill([
            'name' => $product->name,
            'description' => $product->description,
            'price' => $product->price,
            'category_id' => $product->categoryId,
        ]);
        $productModel->save();

        return $productModel->toEntity();
    }

    public function delete(Product $product): bool
    {
        $productModel = ProductModel::find($product->id);
        if (!$productModel) {
            return false;
        }

        return $productModel->delete();
    }
}
