<?php

namespace App\Services\Book;

use App\Enums\BookStatus;
use App\Http\Requests\Book\StoreReviewRequest;
use App\Models\Book;
use App\Models\Review;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;

class BookService
{
    private Book $book;

    public function getPublishedBooks(): Collection
    {
        return Book::query()
            ->where(['status' => BookStatus::Published])
            ->get();
    }

    public function store(CreateBookData $data): Book
    {
        $images = Arr::get($data->toArray(), 'images', []);

        $book = new Book(
            $data->except('images')->toArray()
        );

        $book->save();

        foreach ($images as $image) {
            $path = $image->storePublicly();

            $book->images()->create([
                'url' => Storage::url($path),
            ]);
        }

        return $book;
    }

    public function update(): Book
    {
        $data = [];

        if (request()->method() === 'PUT') {
            $data = [
                'title' => request()->input('title'),
                'page_number' => request()->integer('page_number'),
                'annotation' => request()->input('annotation'),
                'author_id' => request()->integer('author_id'),
            ];
        } else {
            if (request()->has('title')) {
                $data['title'] = request()->input('title');
            }
            if (request()->has('page_number')) {
                $data['page_number'] = request()->integer('page_number');
            }
            if (request()->has('annotation')) {
                $data['annotation'] = request()->input('annotation');
            }
            if (request()->has('author_id')) {
                $data['author_id'] = request()->integer('author_id');
            }
        }

        $this->book->update($data);

        return $this->book;
    }


    public function createReview(StoreReviewRequest $request): Review
    {
        /** @var Review $review */
        return auth()->user()->reviews()->create([
            'text' => $request->input('text'),
            'rate' => $request->integer('rate'),
            'book_id' => $this->book->id,
        ]);
    }

    public function setBook(Book $book): self
    {
        $this->book = $book;

        return $this;
    }
}
