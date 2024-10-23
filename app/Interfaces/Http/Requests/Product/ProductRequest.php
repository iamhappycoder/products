<?php

declare(strict_types=1);

namespace App\Interfaces\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

final class ProductRequest extends FormRequest
{
    const string ID = 'id';
    const string NAME = 'name';
    const string DESCRIPTION = 'description';
    const string PRICE = 'price';
    const string CATEGORY_ID = 'categoryId';

    public function rules(): array
    {
        return [];
    }
}
