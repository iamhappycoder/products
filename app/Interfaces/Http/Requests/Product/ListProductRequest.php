<?php

declare(strict_types=1);

namespace App\Interfaces\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

final class ListProductRequest extends FormRequest
{
    const string CATEGORY_ID = 'categoryId';

    public function rules(): array
    {
        return [
            self::CATEGORY_ID => 'required|integer',
        ];
    }
}
