<?php

declare(strict_types=1);

namespace App\Domain\Products;

use App\Application\UseCases\Products\CreateProductUseCase;
use App\Application\UseCases\Products\CreateProductUseCaseInterface;
use App\Application\UseCases\Products\DeleteProductUseCase;
use App\Application\UseCases\Products\DeleteProductUseCaseInterface;
use App\Application\UseCases\Products\ListProductsUseCase;
use App\Application\UseCases\Products\ListProductsUseCaseInterface;
use App\Application\UseCases\Products\UpdateProductUseCase;
use App\Application\UseCases\Products\UpdateProductUseCaseInterface;
use App\Domain\Products\Repositories\CategoryRepositoryInterface;
use App\Domain\Products\Repositories\ProductRepositoryInterface;
use App\Domain\Products\Services\CreateProductService;
use App\Domain\Products\Services\CreateProductServiceInterface;
use App\Domain\Products\Services\DeleteProductService;
use App\Domain\Products\Services\DeleteProductServiceInterface;
use App\Domain\Products\Services\FindCategoryService;
use App\Domain\Products\Services\FindCategoryServiceInterface;
use App\Domain\Products\Services\FindProductByCategoryService;
use App\Domain\Products\Services\FindProductByCategoryServiceInterface;
use App\Domain\Products\Services\UpdateProductService;
use App\Domain\Products\Services\UpdateProductServiceInterface;
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
        ListProductsUseCaseInterface::class => ListProductsUseCase::class,

        //
        // Services
        //
        CreateProductServiceInterface::class => CreateProductService::class,
        UpdateProductServiceInterface::class => UpdateProductService::class,
        DeleteProductServiceInterface::class => DeleteProductService::class,
        FindCategoryServiceInterface::class => FindCategoryService::class,
        FindProductByCategoryServiceInterface::class => FindProductByCategoryService::class,

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
