@extends('adminlte::page')
@section('content')
    <table class="table table-light table-striped-columns mt-3 rounded">
        <thead class="rounded">
            <tr>
                <th scope="col">#</th>
                @if ($book->cover_url != '')
                    <th scope="col">Обложка книги</th>
                @endif
                <th scope="col">Название</th>
                <th scope="col">Описание</th>
                <th scope="col">Авторы</th>
                <th scope="col">Цена</th>
                <th scope="col">Количество</th>
            </tr>
        </thead>
        <tr>
            <td>{{ $book->id }}</td>

            <td>
                <img src="{{ $book->cover_url != '' ? $book->cover_url : Vite::asset('resources/images/no-image.svg') }}"
                    class="card-img-top w-50" alt="...">
            </td>


            <td>{{ $book->title }}</td>
            <td>{{ $book->description }}</td>
            <td>
                <ul class="p-0">
                    @foreach ($book->authors as $author)
                        <li><a href="{{ route('authors.show', $author->id) }}">{{ $author->first_name }}
                                {{ $author->last_name }}</a><br></li>
                    @endforeach
                </ul>
            </td>
            <td>{{ $book->price }}</td>
            <td>{{ $book->quantity }}</td>

        </tr>
    </table>

    <div class="d-grid gap-2 d-md-block">
        <a class="btn btn-primary mb-3 mt-3" href="{{ route('books.edit', $book->id) }}">Редактировать</a>

        <form action="{{ route('books.destroy', $book->id) }}" method="POST">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-danger mb-3">Удалить</button>
        </form>

        <a href="{{ route('books.index') }}" class="btn btn-secondary">Назад</a>
    </div>
@endsection
