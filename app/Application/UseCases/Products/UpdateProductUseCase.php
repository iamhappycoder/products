<?php

declare(strict_types=1);

namespace App\Application\UseCases\Products;

use App\Application\DTOs\ProductDTO;
use App\Application\Transformers\ProductTransformer;
use App\Domain\Products\Services\UpdateProductServiceInterface;
use App\Infrastructure\External\ConvertCurrencyInterface;

readonly class UpdateProductUseCase implements UpdateProductUseCaseInterface
{
    public function __construct(
        private UpdateProductServiceInterface $updateProductService,
        private ConvertCurrencyInterface $convertCurrency,
    ) {
    }

    public function __invoke(ProductDTO $productDTO): void
    {
        $priceInCents = ($this->convertCurrency)($productDTO->price, 'USD', 'EUR');
        ($this->updateProductService)(ProductTransformer::fromProductDTO($productDTO, $priceInCents));
    }
}
