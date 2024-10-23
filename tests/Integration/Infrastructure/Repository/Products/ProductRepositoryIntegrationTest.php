<?php

namespace Tests\Integration\Infrastructure\Repository\Products;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\Mothers\Products\CategoryMother;
use Tests\Mothers\Products\ProductMother;
use Tests\Seeders\Products\ElectronicsCategorySeeder;
use Tests\Seeders\Products\LaptopProductSeeder;
use Tests\TestCase;
use App\Domain\Products\Repositories\ProductRepositoryInterface;

class ProductRepositoryIntegrationTest extends TestCase
{
    use RefreshDatabase;

    protected ProductRepositoryInterface $productRepository;

    protected function setUp(): void
    {
        parent::setUp();

        $this->productRepository = $this->app->make(ProductRepositoryInterface::class);;
    }

    public function test_find_failure_invalid_id(): void
    {
        $this->seed([
            ElectronicsCategorySeeder::class,
            LaptopProductSeeder::class,
        ]);

        $foundProduct = $this->productRepository->find(-1);

        $this->assertNull($foundProduct);
    }

    public function test_find_success(): void
    {
        $this->seed([
            ElectronicsCategorySeeder::class,
            LaptopProductSeeder::class,
        ]);

        $foundProduct = $this->productRepository->find(1);

        $this->assertNotNull($foundProduct);
        $this->assertSame('Laptop', $foundProduct->name);
    }

    public function test_find_by_category_failure_invalid_category(): void
    {
        $this->seed([
            ElectronicsCategorySeeder::class,
            LaptopProductSeeder::class,
        ]);

        $products = $this->productRepository->findByCategory(CategoryMother::getSportsCategory());

        $this->assertCount(0, $products);
    }

    public function test_find_by_category_success(): void
    {
        $this->seed([
            ElectronicsCategorySeeder::class,
            LaptopProductSeeder::class,
        ]);

        $products = $this->productRepository->findByCategory(CategoryMother::getElectronicsCategory());

        $this->assertCount(1, $products);
        $this->assertEquals('Laptop', $products[0]->name);
    }

    public function test_update_failure_invalid_id(): void
    {
        $this->expectException(ModelNotFoundException::class);
        $this->expectExceptionMessage('Product not found.');

        $this->productRepository->update(ProductMother::getLaptopProductWithInvalidId());
    }

    public function test_create_success(): void
    {
        $this->seed([
            ElectronicsCategorySeeder::class,
            LaptopProductSeeder::class,
        ]);

        $createdProduct = $this->productRepository->create(ProductMother::getLaptopProduct());

        $this->assertSame('Laptop', $createdProduct->name);
        $this->assertDatabaseHas(
            'products',
            [
                'name' => 'Laptop',
                'description' => 'A powerful laptop',
                'price' => 100000,
                'category_id' => 1,
            ]
        );
    }

    public function test_update_success(): void
    {
        $this->seed([
            ElectronicsCategorySeeder::class,
            LaptopProductSeeder::class,
        ]);

        $updatedProduct = $this->productRepository->update(ProductMother::getGamingLaptopProduct());

        $this->assertSame('Gaming Laptop', $updatedProduct->name);
        $this->assertDatabaseHas(
            'products',
            [
                'id' => 1,
                'name' => 'Gaming Laptop',
            ]
        );
    }

    public function test_delete_failure_invalid_id(): void
    {
        $this->seed([
            ElectronicsCategorySeeder::class,
            LaptopProductSeeder::class,
        ]);

        $deleted = $this->productRepository->delete(ProductMother::getLaptopProductWithInvalidId());

        $this->assertFalse($deleted);
        $this->assertDatabaseHas(
            'categories',
            [
                'id' => 1,
            ]
        );
    }

    public function test_delete_success(): void
    {
        $this->seed([
            ElectronicsCategorySeeder::class,
            LaptopProductSeeder::class,
        ]);

        $deleted = $this->productRepository->delete(ProductMother::getGamingLaptopProduct());

        $this->assertTrue($deleted);
        $this->assertDatabaseMissing(
            'products',
            [
                'id' => 1,
            ]
        );
    }
}
