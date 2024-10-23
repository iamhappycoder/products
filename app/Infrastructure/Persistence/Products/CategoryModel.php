<?php

namespace App\Infrastructure\Persistence\Products;

use App\Domain\Products\Entities\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CategoryModel extends Model
{
    protected $table = 'categories';
    public $timestamps = false;

    protected $fillable = [
        'name',
        'description',
    ];

    public function products(): HasMany
    {
        return $this->hasMany(CategoryModel::class, 'category_id');
    }

    public function toEntity(): Category
    {
        return new Category(
            $this->id,
            $this->name,
            $this->description
        );
    }

    public static function fromEntity(Category $category): self
    {
        return new self([
            'name' => $category->name,
            'description' => $category->description,
        ]);
    }
}

