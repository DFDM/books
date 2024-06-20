@extends('adminlte::page')
@section('content')
    <div class="row mt-3">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Редактирование книги</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('books.update', $book->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="mb-3">
                            <label for="title" class="form-label">Название книги</label>
                            <input id="title" type="text" class="form-control"
                                value="{{ old('title', $book->title) }}" name="title">
                            @error('title')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>


                        <div class="mb-3">
                            <label for="authors" class="form-label">Авторы книги</label>
                            <select id="authors" class="w-100" multiple name="authors[]">

                                @foreach ($authors as $author)
                                    <option @selected(in_array($author->id, old('authors', $book_authors ?? []))) value="{{ $author->id }}">
                                        {{ $author->first_name }} {{ $author->last_name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('authors')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Описание книги</label>
                            <textarea id="description" rows="3" class="form-control" name="description">{{ old('description', $book->description) }}</textarea>
                            @error('description')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="cover_url" class="form-label">Обложка книги</label>
                            <div class="mb-3">
                                <img src="{{ $book->cover_url != '' ? $book->cover_url : Vite::asset('resources/images/no-image.svg') }}"
                                    class="card-img-top w-25" alt="...">
                            </div>
                            <input id="cover_url" type="file" class="form-control"
                                value="{{ old('cover_url', $book->cover_url) }}" name="cover_url">
                            @error('cover_url')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="price" class="form-label">Цена книги</label>
                            <input id="price" type="number" class="form-control"
                                value="{{ old('price', $book->price) }}" name="price">
                            @error('price')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="quantity" class="form-label">Количество шт.</label>
                            <input id="quantity" type="number" class="form-control"
                                value="{{ old('quantity', $book->quantity) }}" name="quantity">
                            @error('quantity')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Обновить</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <a href="{{ route('books.index') }}" сlass="btn btn-primary">Назад</a>
@endsection
