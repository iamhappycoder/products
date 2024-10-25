<?php

namespace Tests\Seeders\Products;

use App\Infrastructure\Persistence\Products\ProductModel;
use Tests\Mothers\Products\ProductMother;
use Illuminate\Database\Seeder;

class LaptopProductListSeeder extends Seeder
{
    public function run(): void
    {
        ProductModel::create(ProductMother::getLaptopProductAsArray());
        ProductModel::create(ProductMother::getLaptopProductAsArray(id: 2, name: 'Gaming Laptop'));
    }
}
