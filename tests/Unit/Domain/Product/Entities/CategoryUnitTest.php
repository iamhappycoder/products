<?php

namespace Tests\Unit\Domain\Product\Entities;

use App\Domain\Products\Entities\Category;
use PHPUnit\Framework\TestCase;

class CategoryUnitTest extends TestCase
{
    public function test_instantiation_success(): void
    {
        $category = new Category(
            1,
            'Warp Drive',
            'Faster-than-light (FTL) propulsion system'
        );

        $this->assertSame(1, $category->id);
        $this->assertSame('Warp Drive', $category->name);
        $this->assertSame('Faster-than-light (FTL) propulsion system', $category->description);
    }
}
