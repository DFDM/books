@extends('adminlte::page')
@section('content')
    <div class="row mt-3">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Добавление книги</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('books.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <label for="title" class="form-label">Название книги</label>
                            <input id="title" type="text" class="form-control" name="title"
                                value="{{ old('title') }}">
                            @error('title')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="row mb-3">
                            <label for="authors" class="form-label">Авторы книги</label>
                            <select id="authors" class="w-100 form-control" multiple name="authors[]">
                                @foreach ($authors as $author)
                                    <option value="{{ $author->id }}"
                                        {{ collect(old('authors'))->contains($author->id) ? ' selected' : '' }}>
                                        {{ $author->first_name }} {{ $author->last_name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('authors')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="row mb-3">
                            <label for="description" class="form-label">Описание книги</label>
                            <textarea id="description" rows="3" class="form-control" name="description">{{ old('description') }}</textarea>
                            @error('description')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="row mb-3">
                            <label for="cover_url" class="form-label">Обложка книги</label>
                            <input id="cover_url" type="file" class="form-control" name="cover_url"
                                value="{{ old('cover_url') }}">
                            @error('cover_url')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="row mb-3">
                            <label for="price" class="form-label">Цена книги</label>
                            <input id="price" type="number" class="form-control" name="price"
                                value="{{ old('price') }}">
                            @error('price')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="row mb-3">
                            <label for="quantity" class="form-label">Количество шт.</label>
                            <input id="quantity" type="number" class="form-control" name="quantity"
                                value="{{ old('quantity') }}">
                            @error('quantity')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="row mb-3 flex-row-reverse">
                            <div class="col-sm-2 float-right">
                                <button type="submit" class="btn btn-primary w-100">Добавить</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <a href="{{ route('books.index') }}" сlass="btn btn-primary">Назад</a>
@endsection
