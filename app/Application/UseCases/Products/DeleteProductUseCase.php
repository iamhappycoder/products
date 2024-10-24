<?php

declare(strict_types=1);

namespace App\Application\UseCases\Products;

use App\Application\DTOs\ProductDTO;
use App\Application\Transformers\ProductTransformer;
use App\Domain\Products\Services\DeleteProductServiceInterface;
use App\Infrastructure\External\ConvertCurrencyInterface;

readonly class DeleteProductUseCase implements DeleteProductUseCaseInterface
{
    public function __construct(
        private DeleteProductServiceInterface $deleteProductService,
        private ConvertCurrencyInterface $convertCurrency,
    ) {
    }

    public function __invoke(ProductDTO $productDTO): void
    {
        $priceInCents = ($this->convertCurrency)($productDTO->price, 'USD', 'EUR');
        ($this->deleteProductService)(ProductTransformer::fromProductDTO($productDTO, $priceInCents));
    }
}
