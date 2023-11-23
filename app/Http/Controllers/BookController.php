<?php

namespace App\Http\Controllers;

use App\Facades\BookFacade;
use App\Http\Requests\Book\StoreBookRequest;
use App\Http\Requests\Book\StoreReviewRequest;
use App\Http\Resources\BookListResource;
use App\Http\Resources\BookResource;
use App\Http\Resources\ReviewResource;
use App\Models\Book;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class BookController extends Controller
{
    public function __construct()
    {
        auth()->login(
            User::query()->inRandomOrder()->first()
        );
    }

    // @route /books
    public function index(): AnonymousResourceCollection
    {
        return BookListResource::collection(
            BookFacade::getPublishedBooks()
        );
    }

    // @route /books/{id}
    public function show(Book $book): BookResource
    {
        return new BookResource($book);
    }

    public function store(StoreBookRequest $request): JsonResponse
    {
        $book = BookFacade::store(
            $request->data()
        );

        return response()->json(new BookResource($book), 201);
    }

    public function reviewStore(Book $book, StoreReviewRequest $request): ReviewResource
    {
        return new ReviewResource(
            BookFacade::setBook($book)->createReview($request)
        );
    }

    public function update(Book $book): BookResource
    {
        return new BookResource(
            BookFacade::setBook($book)->update()
        );
    }
}
