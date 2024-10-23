<?php

namespace Tests\Seeders\Products;

use Tests\Mothers\Products\CategoryMother;
use Illuminate\Database\Seeder;
use App\Infrastructure\Persistence\Products\CategoryModel;

class ElectronicsCategorySeeder extends Seeder
{
    public function run(): void
    {
        CategoryModel::create(CategoryMother::getElectronicsCategoryAsArray());
    }
}
