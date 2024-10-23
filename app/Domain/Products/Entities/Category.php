<?php

declare(strict_types=1);

namespace App\Domain\Products\Entities;

class Category
{
    public function __construct(
        public int $id,
        public string $name,
        public string $description,
    ) {
    }
}
