<?php

declare(strict_types=1);

namespace App\Domain\Products;

use App\Application\Services\Products\CreateProductService;
use App\Application\Services\Products\DeleteProductService;
use App\Application\Services\Products\UpdateProductService;
use App\Application\UseCases\Products\CreateProductUseCase;
use App\Application\UseCases\Products\DeleteProductUseCase;
use App\Application\UseCases\Products\UpdateProductUseCase;
use App\Domain\Products\Repositories\CategoryRepositoryInterface;
use App\Domain\Products\Repositories\ProductRepositoryInterface;
use App\Domain\Products\Services\CreateProductServiceInterface;
use App\Domain\Products\Services\DeleteProductServiceInterface;
use App\Domain\Products\Services\UpdateProductServiceInterface;
use App\Domain\Products\UseCases\CreateProductUseCaseInterface;
use App\Domain\Products\UseCases\DeleteProductUseCaseInterface;
use App\Domain\Products\UseCases\UpdateProductUseCaseInterface;
use App\Infrastructure\Repositories\Products\CategoryRepository;
use App\Infrastructure\Repositories\Products\ProductRepository;
use Illuminate\Support\ServiceProvider;

final class ProductsProvider extends ServiceProvider
{
    public array $bindings = [
        //
        // UseCases
        //
        CreateProductUseCaseInterface::class => CreateProductUseCase::class,
        UpdateProductUseCaseInterface::class => UpdateProductUseCase::class,
        DeleteProductUseCaseInterface::class => DeleteProductUseCase::class,

        //
        // Services
        //
        CreateProductServiceInterface::class => CreateProductService::class,
        UpdateProductServiceInterface::class => UpdateProductService::class,
        DeleteProductServiceInterface::class => DeleteProductService::class,

        //
        // Repositories
        //
        ProductRepositoryInterface::class => ProductRepository::class,
        CategoryRepositoryInterface::class => CategoryRepository::class,
    ];

    public function register(): void
    {
    }

    public function boot(): void
    {
    }
}
