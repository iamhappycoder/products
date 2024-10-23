<?php

declare(strict_types=1);

namespace App\Application\Transformers;

use App\Application\DTOs\ProductDTO;
use App\Domain\Products\Entities\Product;
use App\Interfaces\Http\Requests\Product\ProductRequest;
use Symfony\Component\HttpFoundation\Request;

readonly class ProductTransformer
{
    public static function fromRequest(Request $request): Product
    {
        return new Product(
            $request->get(ProductRequest::ID),
            $request->get(ProductRequest::NAME),
            $request->get(ProductRequest::DESCRIPTION),
            $request->get(ProductRequest::PRICE),
            $request->get(ProductRequest::CATEGORY_ID),
        );
    }

    public static function fromProductDTO(
        ProductDTO $productDTO,
        int $priceInCents
    ): Product {
        return new Product(
            $productDTO->id,
            $productDTO->name,
            $productDTO->description,
            $priceInCents,
            $productDTO->categoryId,
        );
    }
}
