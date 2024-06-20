<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Filters\BooksFilter;
use App\Http\Requests\Books\FilterRequest;
use App\Http\Requests\Books\StoreRequest;
use App\Http\Requests\Books\UpdateRequest;
use App\Models\Author;
use App\Models\Book;
use App\Services\Books\Service;

class Books extends Controller
{

    public function index(FilterRequest $request)
    {
        $data = $request->validated();

        $filter = app()->make(BooksFilter::class, ['queryParams' => array_filter($data)]);

        $directionPrice = Service::getDirectionFilter($data, 'price');
        $directionQuantity = Service::getDirectionFilter($data, 'quantity');

        $books = Book::filter($filter)->paginate(12);

        return view('admin.books.index', compact('books', 'data', 'directionPrice', 'directionQuantity'));
    }

    public function create()
    {
        $authors = Author::all();
        return view('admin.books.create', compact('authors'));
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        Service::store($data);

        return redirect()->route('books.index');
    }

    public function show(Book $book)
    {
        return view('admin.books.show', compact('book'));
    }

    public function edit(Book $book)
    {
        $authors = Author::all();
        $book_authors = Service::getBookAuthors($book);


        return view('admin.books.edit', compact('book', 'authors', 'book_authors'));
    }

    public function update(UpdateRequest $request, Book $book)
    {
        $data = $request->validated();

        Service::update($data, $book);

        return redirect()->route('books.show', $book->id);
    }

    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('books.index');
    }
}
