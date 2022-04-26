<?php declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateNewsSourceRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'article' => 'nullable|array',
            'article.title' => 'required_with:article|string'
        ];
    }
}
