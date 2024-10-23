<?php

namespace Tests\Seeders\Products;

use App\Infrastructure\Persistence\Products\ProductModel;
use Tests\Mothers\Products\ProductMother;
use Illuminate\Database\Seeder;

class LaptopProductSeeder extends Seeder
{
    public function run(): void
    {
        ProductModel::create(ProductMother::getLaptopProductAsArray());
    }
}
