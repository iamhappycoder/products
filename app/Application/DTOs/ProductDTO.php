<?php

declare(strict_types=1);

namespace App\Application\DTOs;

readonly class ProductDTO
{
    public function __construct(
        public ?int $id,
        public string $name,
        public string $description,
        public float $price,
        public int $categoryId,
    ) {
    }
}
