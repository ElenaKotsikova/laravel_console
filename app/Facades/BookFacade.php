<?php

namespace App\Facades;

use App\Models\Book;
use App\Services\Book\BookService;
use App\Services\Book\CreateBookData;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Facade;

/**
 * @method static Book store(CreateBookData $data)
 * @method static Collection getPublishedBooks()
 * @method static BookService setBook(Book $book)
 *
 * @see \App\Services\Book\BookService
 */
class BookFacade extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'book';
    }
}
