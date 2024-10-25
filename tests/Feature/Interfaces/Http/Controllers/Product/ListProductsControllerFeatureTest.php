<?php

namespace Tests\Feature\Interfaces\Http\Controllers\Product;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\Seeders\Products\ElectronicsCategorySeeder;
use Tests\Seeders\Products\LaptopProductListSeeder;
use Tests\TestCase;

class ListProductsControllerFeatureTest extends TestCase
{
    use RefreshDatabase;

    public function test_invoke_success(): void
    {
        $this->seed([
            ElectronicsCategorySeeder::class,
            LaptopProductListSeeder::class,
        ]);

        $response = $this->get('/api/v1/products?categoryId=1');

        $response->assertStatus(200);
        $response->assertJson([
        'data' => [
            [
                'id' => 1,
                'name' => 'Laptop',
                'description' => 'A powerful laptop',
                'price' => 100000,
                'categoryId' => 1,
            ],
            [
                'id' => 2,
                'name' => 'Gaming Laptop',
                'description' => 'A powerful laptop',
                'price' => 100000,
                'categoryId' => 1,
            ],
        ],
    ]);
    }
}
