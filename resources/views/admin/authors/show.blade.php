@extends('adminlte::page')
@section('content')
    <table class="table table-light table-striped-columns mt-3">
        <thead>
            <tr>
                <th scope="col">#</th>
                @if ($author->avatar_url != '')
                    <th scope="col">Аватар</th>
                @endif
                <th scope="col">Имя</th>
                <th scope="col">Фамилия</th>
                <th scope="col">Рейтинг</th>

                <th scope="col">Книги</th>

            </tr>
        </thead>
        <tr>
            <td>{{ $author->id }}</td>

            <td>
                <img src="{{ $author->avatar_url != '' ? $author->avatar_url : Vite::asset('resources/images/no-image.svg') }}"
                    class="card-img-top w-50" alt="...">
            </td>


            <td>{{ $author->first_name }}</td>
            <td>{{ $author->last_name }}</td>
            <td>{{ $author->rank }}</td>
            <td>
                @if ($author->books != '')
                    <ul>
                        @foreach ($author->books as $book)
                            <li> <a href="{{ route('books.show', $book->id) }}">{{ $book->title }}</a></li>
                        @endforeach
                    </ul>
                @endif
            </td>

        </tr>
    </table>

    <div class="d-grid gap-2 d-md-block">
        <a class="btn btn-primary mb-3 mt-3" href="{{ route('authors.edit', $author->id) }}">Редактировать</a>

        <form action="{{ route('authors.destroy', $author->id) }}" method="POST">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-danger mb-3">Удалить</button>
        </form>

        <a href="{{ route('authors.index') }}" class="btn btn-secondary">Назад</a>
    </div>

@endsection
