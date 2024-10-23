<?php

namespace Tests\Integration\Infrastructure\Repository\Products;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Tests\Mothers\Products\CategoryMother;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\Seeders\Products\ElectronicsCategorySeeder;
use Tests\TestCase;
use App\Domain\Products\Repositories\CategoryRepositoryInterface;

class CategoryRepositoryIntegrationTest extends TestCase
{
    use RefreshDatabase;

    protected CategoryRepositoryInterface $categoryRepository;

    protected function setUp(): void
    {
        parent::setUp();

        $this->categoryRepository = $this->app->make(CategoryRepositoryInterface::class);;
    }

    public function test_create_success(): void
    {
        $createdCategory = $this->categoryRepository->create(CategoryMother::getElectronicsCategory());

        $this->assertEquals('Electronics', $createdCategory->name);
        $this->assertDatabaseHas('categories', [
            'name' => 'Electronics',
            'description' => 'Gadgets and devices',
        ]);
    }

    public function test_find_failure_invalid_id(): void
    {
        $foundCategory = $this->categoryRepository->find(-1);

        $this->assertNull($foundCategory);
    }

    public function test_find_success(): void
    {
        $this->seed([ElectronicsCategorySeeder::class]);

        $foundCategory = $this->categoryRepository->find(1);

        $this->assertNotNull($foundCategory);
        $this->assertEquals('Electronics', $foundCategory->name);
    }

    public function test_update_failure_invalid_id(): void
    {
        $this->expectException(ModelNotFoundException::class);
        $this->expectExceptionMessage('Category not found.');

        $this->categoryRepository->update(CategoryMother::getElectronicsCategoryWithInvalidId());
    }

    public function test_update_success(): void
    {
        $this->seed([ElectronicsCategorySeeder::class]);

        $updatedCategory = $this->categoryRepository->update(CategoryMother::getElectronicsCategoryWithUpdatedName());

        $this->assertEquals('Computer Electronics', $updatedCategory->name);
        $this->assertDatabaseHas('categories', [
            'id' => 1,
            'name' => 'Computer Electronics',
        ]);
    }

    public function test_delete_failure_invalid_id(): void
    {
        $this->seed([ElectronicsCategorySeeder::class]);

        $deleted = $this->categoryRepository->delete(CategoryMother::getElectronicsCategoryWithInvalidId());

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
        $this->seed([ElectronicsCategorySeeder::class]);

        $deleted = $this->categoryRepository->delete(CategoryMother::getElectronicsCategory());

        $this->assertTrue($deleted);
        $this->assertDatabaseMissing('categories', [
            'id' => 1,
        ]);
    }
}
