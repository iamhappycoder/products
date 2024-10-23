<?php

namespace Tests\Mothers\Products;

use App\Domain\Products\Entities\Category;

class CategoryMother
{
    public static function getElectronicsCategoryAsArray(
        int $id = 1,
        string $name = 'Electronics',
        string $description = 'Gadgets and devices',
    ): array
    {
        return [
            'id' => $id,
            'name' => $name,
            'description' => $description,
        ];
    }

    public static function getSportsCategoryAsArray(
        int $id = 2,
        string $name = 'Sports',
        string $description = 'Equipment and gear for various sports',
    ): array
    {
        return [
            'id' => $id,
            'name' => $name,
            'description' => $description,
        ];
    }

    public static function getElectronicsCategory(): Category
    {
        return new Category(...array_values(self::getElectronicsCategoryAsArray()));
    }

    public static function getElectronicsCategoryWithInvalidId(): Category
    {
        return new Category(...self::getElectronicsCategoryAsArray(id: -1));
    }

    public static function getElectronicsCategoryWithUpdatedName(): Category
    {
        return new Category(...self::getElectronicsCategoryAsArray(name: 'Computer Electronics'));
    }

    public static function getSportsCategory(): Category
    {
        return new Category(...self::getSportsCategoryAsArray());
    }
}
