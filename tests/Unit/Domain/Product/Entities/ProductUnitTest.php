<?php

namespace Tests\Unit\Domain\Product\Entities;

use App\Domain\Products\Entities\Product;
use PHPUnit\Framework\TestCase;

class ProductUnitTest extends TestCase
{
    public function test_instantiation_success(): void
    {
        $product = new Product(
            1,
            'Federation Starship Warp Drive',
            'A quantum fusion reactor powered warp drive with a warp factor of 9!',
            100,
            2,
        );

        $this->assertSame(1, $product->id);
        $this->assertSame('Federation Starship Warp Drive', $product->name);
        $this->assertSame('A quantum fusion reactor powered warp drive with a warp factor of 9!', $product->description);
        $this->assertSame(100, $product->price);
        $this->assertSame(2, $product->categoryId);
    }
}
