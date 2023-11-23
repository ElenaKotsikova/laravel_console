<?php

namespace App\Console\Commands;

use App\Facades\BookFacade;
use App\Http\Resources\BookListResource;
use App\Models\Book;
use Illuminate\Console\Command;

class BookLoadCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:book-load';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Loads book from file';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $data = file_get_contents(__DIR__ . '/book.json');
        $data = json_decode($data, true);

        $book = new Book($data);
        dd($book);
    }
}
