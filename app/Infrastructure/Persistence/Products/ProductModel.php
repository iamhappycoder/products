<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistence\Products;

use App\Domain\Products\Entities\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductModel extends Model
{
    protected $table = 'products';
    public $timestamps = false;

    protected $fillable = [
        'name',
        'description',
        'price', // in cents
        'category_id',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(CategoryModel::class, 'category_id');
    }

    public function toEntity(): Product
    {
        return new Product(
            $this->id,
            $this->name,
            $this->description,
            $this->price,
            $this->category_id
        );
    }

    public static function fromEntity(Product $product): self
    {
        return new self([
            'name' => $product->name,
            'description' => $product->description,
            'price' => $product->price,
            'category_id' => $product->categoryId,
        ]);
    }
}
