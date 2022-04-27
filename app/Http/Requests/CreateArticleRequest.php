<?php declare(strict_types=1);

namespace App\Http\Requests;

use App\Enum\Tag;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class CreateArticleRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => 'required|string',
            'tags' => 'required|array',
            'tags.*' => ['required', new Enum(Tag::class)],
            'newsSourceId' => 'required|numeric'
        ];
    }
}
