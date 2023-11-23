<?php

namespace App\Http\Requests\Book;

use Illuminate\Foundation\Http\FormRequest;

class StoreReviewRequest extends FormRequest
{

    public function rules(): array
    {
        return [
            'text' => ['string'],
            'rate' => ['int', 'min:1', 'max:5'],
        ];
    }
}
