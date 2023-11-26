<?php

namespace App\Services\Book;

//use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class CreateBookData extends Data
{
    public string $title;

//    #[MapInputName('page_number')]
//    public int|Optional $pageNumber;

    public int|Optional $page_number;

    public string|Optional $annotation;

//    public BookStatus $status;

    public array|Optional $images;

    public int $author_id;
    public int $publisher_id;
}
