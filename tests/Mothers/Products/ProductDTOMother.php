<?php

namespace Tests\Mothers\Products;

use App\Application\DTOs\ProductDTO;

readonly class ProductDTOMother
{
    public static function getLaptopProductDTO(): ProductDTO
    {
        return new ProductDTO(
            null,
            'Laptop',
            'A powerful laptop',
            1.0,
            1,
        );
    }
}
