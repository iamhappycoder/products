<?php

declare(strict_types=1);

namespace App\Application\UseCases\Products;

use App\Application\DTOs\ProductDTO;
use App\Application\Transformers\ProductTransformer;
use App\Domain\Products\Services\CreateProductServiceInterface;
use App\Infrastructure\External\ConvertCurrencyInterface;

readonly class CreateProductUseCase implements CreateProductUseCaseInterface
{
    public function __construct(
        private CreateProductServiceInterface $createProductService,
        private ConvertCurrencyInterface $convertCurrency,
    ) {
    }

    public function __invoke(ProductDTO $productDTO): int
    {
        $priceInCents = ($this->convertCurrency)($productDTO->price, 'USD', 'EUR');
        $product = ($this->createProductService)(ProductTransformer::fromProductDTO($productDTO, $priceInCents));

        return $product->id;
    }
}
