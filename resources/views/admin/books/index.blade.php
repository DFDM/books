@extends('layouts.main')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <a class="btn btn-primary mb-3 mt-3" role="button" href="{{ route('books.create') }}">Добавить книгу</a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Поиск книг</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">

                    <form method="GET" action="{{ route('books.index') }}">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="title" class="form-label">Название</label>
                                    <input type="text" class="form-control" id="title" name="title"
                                        value="{{ $data['title'] ?? '' }}">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="description" class="form-label">Описание</label>
                                    <input type="text" class="form-control" id="description" name="description"
                                        value="{{ $data['description'] ?? '' }}">
                                </div>
                            </div>
                        </div>
                        <div class="row flex-row-reverse">
                            <div class="col-sm-2 float-right">
                                <button type="submit" class="btn btn-primary align-self-end w-100">Найти</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <div class="row justify-content-center mb-4">
        <div class="col mb-3">
            <a class="item" href="{{ request()->fullUrlWithQuery(['price' => $directionPrice]) }}">Сортировать по цене <i
                    class="fa fa-arrow-{{ $directionPrice == 'asc' ? 'up' : 'down' }}"></i></a>
            <a class="item" href="{{ request()->fullUrlWithQuery(['quantity' => $directionQuantity]) }}">Сортировать по
                количеству <i class="fa fa-arrow-{{ $directionQuantity == 'asc' ? 'up' : 'down' }}"></i></a>
            <a href="{{ url()->current() }}"><button type="button" class="btn btn-primary float-end"> <i
                        class="fas fa-filter"></i> Сбросить фильтры </button></a>
        </div>
    </div>

    <div class="row justify-content-center">
        @foreach ($books as $book)
            <div class="col-md-3 mx-auto mb-3 border-0">
                <div class="card h-100">
                    <a href="{{ route('books.show', $book->id) }}"><img
                            src="{{ $book->cover_url != '' ? $book->cover_url : Vite::asset('resources/images/no-image.svg') }}"
                            class="card-img-top" alt="..."></a>
                    <div class="card-body">
                        <h5 class="card-title"> <a href="{{ route('books.show', $book->id) }}">{{ $book->title }}</a>
                        </h5>
                        <p class="card-text">{{ $book->description }}</p>
                        <p class="card-text">Цена: {{ $book->price }}</p>
                        <p class="card-text">Наличие: {{ $book->quantity }} шт.</p>
                        <a href="{{ route('books.show', $book->id) }}" class="btn btn-primary">Подробнее</a>
                    </div>
                </div>
            </div>
        @endforeach


    </div>

    <div class="row mt-3">
        {{ $books->withQueryString()->links() }}
    </div>
@endsection
