<?php

namespace App\Http\Resources;

use App\Models\Book;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin Book
 */
class BookResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'author' => $this->author->surname,
            'images' => $this->images->map(fn (Image $image) => $image->url),
            'reviews' => ReviewResource::collection($this->reviews),
        ];
    }
}
