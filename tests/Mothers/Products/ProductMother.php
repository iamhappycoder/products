<?php

namespace Tests\Mothers\Products;

use App\Domain\Products\Entities\Product;

class ProductMother
{
    public static function getLaptopProductAsArray(
        int $id = 1,
        string $name = 'Laptop',
        string $description = 'A powerful laptop',
        int $price = 100000,
        int $categoryId = 1,
    ): array
    {
        return [
            'id' => $id,
            'name' => $name,
            'description' => $description,
            'price' => $price,
            'category_id' => $categoryId,
        ];
    }

    public static function getLaptopProduct(): Product
    {
        return new Product(...array_values(self::getLaptopProductAsArray()));
    }

    public static function getLaptopProductWithInvalidId(): Product
    {
        return new Product(...array_values(self::getLaptopProductAsArray(id: -1)));
    }

    public static function getGamingLaptopProduct(): Product
    {
        return new Product(...array_values(self::getLaptopProductAsArray(name: 'Gaming Laptop')));
    }
}
