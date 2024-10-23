<?php

namespace App\Infrastructure\Repositories\Products;

use App\Domain\Products\Entities\Category;
use App\Infrastructure\Persistence\Products\CategoryModel;
use App\Domain\Products\Repositories\CategoryRepositoryInterface;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class CategoryRepository implements CategoryRepositoryInterface
{
    public function find(int $id): ?Category
    {
        $categoryModel = CategoryModel::find($id);

        return $categoryModel ? $categoryModel->toEntity() : null;
    }

    public function create(Category $category): Category
    {
        $categoryModel = CategoryModel::fromEntity($category);
        $categoryModel->save();

        return $categoryModel->toEntity();
    }

    public function update(Category $category): Category
    {
        $categoryModel = CategoryModel::find($category->id);
        if (!$categoryModel) {
            throw new ModelNotFoundException("Category not found.");
        }

        $categoryModel->fill([
            'name' => $category->name,
            'description' => $category->description,
        ]);
        $categoryModel->save();

        return $categoryModel->toEntity();
    }

    // Delete a category
    public function delete(Category $category): bool
    {
        $categoryModel = CategoryModel::find($category->id);
        if (!$categoryModel) {
            return false;
        }

        return $categoryModel->delete();
    }
}

