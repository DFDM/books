<?php

namespace App\Http\Controllers\Api\Book;

use App\Http\Controllers\Controller;
use App\Http\Filters\BooksFilter;
use App\Http\Requests\Books\FilterRequest;
use App\Http\Resources\BookResource;
use App\Models\Book;

class Books extends Controller
{
    public function index(FilterRequest $request)
    {
        $data = $request->validated();
        $filter = app()->make(BooksFilter::class, ['queryParams' => array_filter($data)]);

        $books = Book::filter($filter)->paginate(12);

        return BookResource::collection($books);
    }
}
