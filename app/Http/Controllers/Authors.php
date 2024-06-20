<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Filters\AuthorsFilter;
use App\Http\Requests\Authors\FilterRequest;
use App\Http\Requests\Authors\StoreRequest;

use App\Http\Requests\Authors\UpdateRequest;
use App\Http\Resources\AuthorsResource;
use App\Models\Author;
use App\Services\Authors\Service;

class Authors extends Controller
{
    public function index(FilterRequest $request)
    {
        $data = $request->validated();

        $page = $data['page'] ?? 1;
        $perPage = $data['per_page'] ?? 10;

        $filter = app()->make(AuthorsFilter::class, ['queryParams' => array_filter($data)]);

        $authors = Author::filter($filter)->paginate($perPage, ['*'], 'page', $page);

        return view('admin.authors.index', compact('authors', 'data'));
    }

    public function create()
    {
        return view('admin.authors.create');
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        $author = Service::store($data);

        return redirect()->route('authors.index');
    }

    public function show(Author $author)
    {
        return view('admin.authors.show', compact('author'));
    }

    public function edit(Author $author)
    {
        return view('admin.authors.edit', compact('author'));
    }

    public function update(UpdateRequest $request, Author $author)
    {
        $data = $request->validated();
        $author = Service::update( $data,  $author);

        return redirect()->route('authors.show', $author);
    }

    public function destroy(Author $author)
    {
        $author->delete();
        return redirect()->route('authors.index');
    }
}
