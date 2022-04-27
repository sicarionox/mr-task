<?php declare(strict_types=1);

namespace App\Http\Requests;

use App\Enum\Tag;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class CreateNewsSourceRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'article' => 'nullable|array',
            'article.title' => 'required_with:article|string',
            'article.tags' => 'required_with:article|array',
            'article.tags.*' => ['required', new Enum(Tag::class)]
        ];
    }
}
